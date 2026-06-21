<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS - Pakistan Stock Hub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <style>
        .hero { background: linear-gradient(135deg, #0f5132 0%, #198754 100%); color: white; padding: 3rem 2rem; border-radius: 8px; margin-bottom: 2rem; }
        .hero h1 { margin-bottom: 0.5rem; color: #ffffff; }
        .hero p { color: #d1e7dd; margin-bottom: 0; }
        .card-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
        .nav-brand { font-weight: bold; color: #198754; font-size: 1.25rem; }
    </style>
</head>
<body>
 <nav class="container">
    <ul>
        <li><span class="nav-brand">⚡ Apex Distribution Hub</span></li>
    </ul>
    <ul>
        <li><a href="{{ route('dashboard') }}" class="secondary">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}">Stock Ledger</a></li>
        <li><a href="{{ route('orders.create') }}" role="button" class="outline">New Order Submission</a></li>
    </ul>
</nav>

    <main class="container">
        <div class="hero">
            <h1>Smart Inventory & Order Manager</h1>
            <p>Enterprise grade tracking solution tailored for wholesale business metrics across Pakistan.</p>
        </div>

        <section>
            <h2>Quick Actions</h2>
            <div class="card-grid">
                <article>
                    <h3>Order Dispatch</h3>
                    <p>Launch the interactive interface to book customer shipments instantly.</p>
                    <a href="{{ route('orders.create') }}" role="button" style="width: 100%;">+ Book New Order</a>
                </article>
                <article>
                    <h3>Stock Ledger</h3>
                    <p>Review real-time supply levels, checking barcodes, SKUs, and items running low.</p>
                    <a href="{{ route('products.index') }}" role="button" class="secondary" style="width: 100%;">View Inventory</a>
                </article>
            </div>
        </section>
    </main>
</body>
</html>