<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
    <main class="container">
        <header style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1>Smart Inventory Manager</h1>
                <p>Track products, stock levels, and customer orders seamlessly.</p>
            </div>
        </header>

        <section>
            <h2>Product Catalog</h2>
            <figure>
                <table role="grid">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Stock Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><strong>{{ $product->name }}</strong></td>
                                <td><code>{{ $product->sku }}</code></td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock_quantity }} units</td>
                                <td>
                                    @if($product->stock_quantity <= 10)
                                        <mark style="background-color: #ffcc00; color: #000;">Low Stock</mark>
                                    @else
                                        <span style="color: green;">✔ In Stock</span>
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