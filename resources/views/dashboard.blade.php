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
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        nav { background: #ffffff; border-bottom: 1px solid #e3e6f0; padding: 1rem 0; margin-bottom: 2rem; }
        .nav-brand { font-weight: 700; color: #212529; font-size: 1.2rem; display: flex; align-items: center; gap: 0.5rem; }
        .hero-banner { background: #ffffff; border: 1px solid #e3e6f0; border-radius: 12px; padding: 2.5rem; margin-bottom: 2rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02); }
        .hero-banner h1 { font-weight: 700; color: #1a1a1a; }
        .card-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; }
        article { background: #ffffff; border: 1px solid #e3e6f0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.01); transition: transform 0.2s; }
        article:hover { transform: translateY(-2px); }
        .icon-box { font-size: 1.5rem; color: #0d6efd; margin-bottom: 1rem; }
    </style>
</head>
<body>

    <nav>
        <div class="container" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0;">
            <span class="nav-brand">
                <i class="fa-solid fa-boxes-stacked text-primary"></i> Inventory Manager
            </span>
            <ul style="margin-bottom: 0; display: flex; gap: 1.5rem; list-style: none; align-items: center;">
                <li><a href="{{ route('dashboard') }}" class="secondary"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                <li><a href="{{ route('products.index') }}" class="secondary"><i class="fa-solid fa-warehouse"></i> Stock Ledger</a></li>
                <li><a href="{{ route('orders.create') }}" role="button" class="outline" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> New Order</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <div class="hero-banner">
            <h1><i class="fa-solid fa-circle-check" style="color: #198754;"></i> System Operational</h1>
            <p style="color: #6c757d; margin-bottom: 0;">Real-time asset management, order tracking matrix, and dynamic stock verification parameters.</p>
        </div>

        <section>
            <h2 style="font-weight: 600; font-size: 1.5rem; margin-bottom: 1.5rem;">Quick Actions</h2>
            <div class="card-grid">
                <article>
                    <div class="icon-box" style="color: #198754;"><i class="fa-solid fa-cart-plus"></i></div>
                    <h3 style="font-size: 1.2rem; font-weight: 600;">Order Management</h3>
                    <p style="color: #6c757d; font-size: 0.9rem;">Launch interactive booking terminal to dispatch consumer transactions directly into system ledger lines.</p>
                    <a href="{{ route('orders.create') }}" role="button" style="width: 100%; background: #198754; border-color: #198754;">Create Order</a>
                </article>
                <article>
                    <div class="icon-box" style="color: #4f46e5;"><i class="fa-solid fa-list-check"></i></div>
                    <h3 style="font-size: 1.2rem; font-weight: 600;">Inventory Records</h3>
                    <p style="color: #6c757d; font-size: 0.9rem;">Evaluate catalog quantities, track unique batch numbers, and audit low supply threshold notifications.</p>
                    <a href="{{ route('products.index') }}" role="button" class="secondary" style="width: 100%;">View Ledger</a>
                </article>
            </div>
        </section>
    </main>

</body>
</html>