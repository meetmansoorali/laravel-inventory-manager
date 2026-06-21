<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Ledger - Distribution Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        nav { background: #ffffff; border-bottom: 1px solid #e3e6f0; padding: 1rem 0; margin-bottom: 2rem; }
        .nav-brand { font-weight: 700; color: #212529; font-size: 1.2rem; display: flex; align-items: center; gap: 0.5rem; }
        table { background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.01); border: 1px solid #e3e6f0; }
        th { font-weight: 600; background-color: #f1f3f9; color: #495057; }
    </style>
</head>
<body>

    <nav>
        <div class="container" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0;">
            <span class="nav-brand"><i class="fa-solid fa-boxes-stacked"></i> Apex Distribution Hub</span>
            <ul style="margin-bottom: 0; display: flex; gap: 1.5rem; list-style: none; align-items: center;">
                <li><a href="{{ route('dashboard') }}" class="secondary"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                <li><a href="{{ route('products.index') }}" class="secondary"><i class="fa-solid fa-warehouse"></i> Stock Ledger</a></li>
                <li><a href="{{ route('orders.create') }}" role="button" class="outline" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> New Order</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <header style="margin-bottom: 1.5rem;">
            <h1 style="font-weight: 700; margin-bottom: 0.25rem;">Product Ledger Registry</h1>
            <p style="color: #6c757d;">Complete tracking reference parameters for all stock categories on hand.</p>
        </header>

        <section>
            <figure>
                <table role="grid">
                    <thead>
                        <tr>
                            <th><i class="fa-solid fa-tag"></i> Item Details</th>
                            <th><i class="fa-solid fa-barcode"></i> SKU Reference</th>
                            <th><i class="fa-solid fa-money-bill-wave"></i> Wholesale Value</th>
                            <th><i class="fa-solid fa-cubes"></i> Inventory Count</th>
                            <th><i class="fa-solid fa-circle-info"></i> Health Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><strong>{{ ucwords($product->name) }}</strong></td>
                                <td><code>{{ $product->sku }}</code></td>
                                <td>Rs. {{ number_format($product->price, 0) }}</td>
                                <td>{{ $product->stock_quantity }} units</td>
                                <td>
                                    @if($product->stock_quantity <= 10)
                                        <span style="color: #dc3545; font-weight: 600; font-size: 0.85rem; background: #f8d7da; padding: 4px 8px; border-radius: 4px;">
                                            <i class="fa-solid fa-triangle-exclamation"></i> Low Inventory
                                        </span>
                                    @else
                                        <span style="color: #198754; font-weight: 600; font-size: 0.85rem; background: #d1e7dd; padding: 4px 8px; border-radius: 4px;">
                                            <i class="fa-solid fa-square-check"></i> Stock Optimal
                                        </span>
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