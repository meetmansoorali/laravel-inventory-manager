<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Ledger</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
    <nav class="container">
        <ul>
            <li><strong style="color: #198754;">🇵🇰 StockEase Pakistan</strong></li>
        </ul>
        <ul>
            <li><a href="{{ route('dashboard') }}" class="secondary">Dashboard</a></li>
            <li><a href="{{ route('products.index') }}">Inventory List</a></li>
            <li><a href="{{ route('orders.create') }}" role="button" class="outline">Create Order</a></li>
        </ul>
    </nav>

    <main class="container">
        <header style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1>Product Catalog Ledger</h1>
                <p>Overview of wholesale values, SKU tracking IDs, and real-time available stock.</p>
            </div>
        </header>

        <section>
            <figure>
                <table role="grid">
                    <thead>
                        <tr>
                            <th>Item Details</th>
                            <th>SKU Code</th>
                            <th>Wholesale Price</th>
                            <th>Current Inventory</th>
                            <th>Availability Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><strong>{{ ucwords($product->name) }}</strong></td>
                                <td><code>{{ $product->sku }}</code></td>
                                <td>Rs. {{ number_format($product->price, 0) }}</td>
                                <td>{{ $product->stock_quantity }} items</td>
                                <td>
                                    @if($product->stock_quantity <= 10)
                                        <mark style="background-color: #dc3545; color: white; padding: 2px 8px; border-radius: 4px;">Low Stock</mark>
                                    @else
                                        <span style="color: #198754; font-weight: bold;">✔ Healthy Stock</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </figure>
        </section>
    </main>
</body>
</html>