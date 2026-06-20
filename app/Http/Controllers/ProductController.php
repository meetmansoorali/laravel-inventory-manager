<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products sorted by latest
        $products = Product::latest()->get();

        // Pass the products to our blade view
        return view('products.index', compact('products'));
    }
}