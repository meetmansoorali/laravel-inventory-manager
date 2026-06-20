<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create()
    {
        $products = Product::where('stock_quantity', '>', 0)->get();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        // 1. Strict Validation
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        try {
            // 2. Use Database Transactions for multi-table safety
            $result = DB::transaction(function () use ($validated) {
                
                // Create the base Order record
                $order = Order::create([
                    'customer_name' => $validated['customer_name'],
                    'total_amount' => 0.00, // Will calculate below
                    'status' => 'completed'
                ]);

                $totalAmount = 0;

                // Loop through each submitted item line
                foreach ($validated['items'] as $itemData) {
                    // Lock the product row for update to prevent race conditions
                    $product = Product::lockForUpdate()->find($itemData['product_id']);

                    // Check stock levels manually before reducing inventory
                    if ($product->stock_quantity < $itemData['quantity']) {
                        throw new \Exception("Sorry, '{$product->name}' is out of stock or does not have enough inventory.");
                    }

                    // Deduct stock line
                    $product->decrement('stock_quantity', $itemData['quantity']);

                    // Create line item record
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $itemData['quantity'],
                        'price' => $product->price // Snapshot price at time of purchase
                    ]);

                    $totalAmount += ($product->price * $itemData['quantity']);
                }

                // Update final calculated total amount on order record
                $order->update(['total_amount' => $totalAmount]);

                return $order;
            });

            return response()->json([
                'message' => 'Order placed successfully!',
                'order_id' => $result->id
            ], 201);

        } catch (\Exception $e) {
            // If anything failed inside the transaction block, the DB rolls back completely.
            return response()->json([
                'error' => $e->getMessage()
            ], 422);
        }
    }
}