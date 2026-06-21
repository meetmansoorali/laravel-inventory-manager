<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Distribution Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { --spacing: 0.75rem; --form-element-spacing-vertical: 0.5rem; --form-element-spacing-horizontal: 0.75rem; }
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; font-size: 0.9rem; }
        nav { background: #ffffff; border-bottom: 1px solid #e3e6f0; padding: 0.5rem 0; margin-bottom: 1rem; }
        .nav-brand { font-weight: 700; color: #212529; font-size: 1rem; display: flex; align-items: center; gap: 0.5rem; }
        nav ul a, nav ul button { font-size: 0.85rem; padding: 0.4rem 0.8rem !important; }
        .hero-banner { background: #ffffff; border: 1px solid #e3e6f0; border-radius: 6px; padding: 1.25rem; margin-bottom: 1rem; }
        .hero-banner h1 { font-size: 1.3rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.25rem; }
        .hero-banner p { font-size: 0.85rem; margin-bottom: 0; }
        .card-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1rem; }
        article { background: #ffffff; border: 1px solid #e3e6f0; border-radius: 6px; padding: 1rem; margin-bottom: 0; }
        article h3 { font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; }
        article p { font-size: 0.8rem; color: #6c757d; margin-bottom: 1rem; }
        article role[button], article a { font-size: 0.8rem; padding: 0.4rem 0.75rem; }
        .icon-box { font-size: 1.1rem; margin-bottom: 0.5rem; }
    </style>
</head>
<body>

    <nav>
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <span class="nav-brand"><i class="fa-solid fa-boxes-stacked"></i> Apex Hub</span>
            <ul style="display: flex; gap: 0.5rem; list-style: none; margin: 0; padding: 0;">
                <li><a href="{{ route('dashboard') }}" class="secondary"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                <li><a href="{{ route('products.index') }}" class="secondary"><i class="fa-solid fa-warehouse"></i> Stock</a></li>
                <li><a href="{{ route('orders.create') }}" role="button" class="outline"><i class="fa-solid fa-plus"></i> Order</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <div class="hero-banner">
            <h1><i class="fa-solid fa-circle-check" style="color: #198754;"></i> System Online</h1>
            <p style="color: #6c757d;">Operational monitoring console for stock ledgers and distribution streams.</p>
        </div>

        <section>
            <h2 style="font-weight: 600; font-size: 1.1rem; margin-bottom: 0.75rem;">Console Directory</h2>
            <div class="card-grid">
                <article>
                    <div class="icon-box" style="color: #198754;"><i class="fa-solid fa-cart-plus"></i></div>
                    <h3>Order Dispatch</h3>
                    <p>Process live warehouse transactions and book items into database arrays.</p>
                    <a href="{{ route('orders.create') }}" role="button" style="width: 100%; background: #198754; border-color: #198754;">Open Terminal</a>
                </article>
                <article>
                    <div class="icon-box" style="color: #4f46e5;"><i class="fa-solid fa-list-check"></i></div>
                    <h3>Stock Ledger</h3>
                    <p>Audit unit levels, view real-time adjustments, and monitor capacity margins.</p>
                    <a href="{{ route('products.index') }}" role="button" class="secondary" style="width: 100%;">View Ledger</a>
                </article>
            </div>
        </section>
    </main>

</body>
</html>