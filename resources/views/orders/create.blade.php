<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order - Distribution Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        :root { --spacing: 0.75rem; --form-element-spacing-vertical: 0.4rem; --form-element-spacing-horizontal: 0.6rem; }
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; font-size: 0.85rem; }
        nav { background: #ffffff; border-bottom: 1px solid #e3e6f0; padding: 0.5rem 0; margin-bottom: 1rem; }
        .nav-brand { font-weight: 700; color: #212529; font-size: 1rem; display: flex; align-items: center; gap: 0.5rem; }
        nav ul a, nav ul button { font-size: 0.85rem; padding: 0.4rem 0.8rem !important; }
        form { background: #ffffff; border: 1px solid #e3e6f0; border-radius: 6px; padding: 1.5rem; max-width: 800px; margin: 0 auto; box-shadow: 0 2px 4px rgba(0,0,0,0.01); }
        h1 { font-size: 1.25rem; font-weight: 700; margin-bottom: 0.25rem; }
        h3 { font-size: 1rem; font-weight: 600; }
        input, select, button { font-size: 0.85rem !important; height: auto !important; }
        table { border: 1px solid #e3e6f0; border-radius: 4px; overflow: hidden; margin-top: 0.5rem; }
        th, td { padding: 0.5rem !important; font-size: 0.85rem; }
        th { background-color: #f1f3f9; color: #495057; font-weight: 600; }
        .btn-add { background-color: #f1f3f9; color: #495057; border: 1px solid #ced4da; font-weight: 500; }
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
        <form id="orderForm">
            <header style="margin-bottom: 1rem;">
                <h1><i class="fa-solid fa-file-invoice" style="color: #4f46e5; margin-right: 0.25rem;"></i> Order Entry Panel</h1>
                <p style="color: #6c757d; font-size: 0.8rem; margin-bottom: 0;">Compile customer transaction requests efficiently.</p>
            </header>

            <label for="customer_name" style="font-weight: 600; font-size: 0.8rem; margin-bottom: 0.25rem;">Customer / Account Name</label>
            <input type="text" id="customer_name" name="customer_name" placeholder="e.g., Al-Rehman Traders" required>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                <h3><i class="fa-solid fa-list"></i> Line Items</h3>
                <button type="button" class="btn-add" id="addItemBtn" style="width: auto; padding: 0.25rem 0.75rem; margin-bottom: 0;">
                    <i class="fa-solid fa-plus"></i> Append Row
                </button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width: 65%;">Product Inventory Choice</th>
                        <th style="width: 20%;">Qty</th>
                        <th style="width: 15%; text-align: center;">Drop</th>
                    </tr>
                </thead>
                <tbody id="itemsContainer"></tbody>
            </table>
            
            <div style="text-align: right; margin-top: 1rem;">
                <button type="submit" style="background: #4f46e5; border-color: #4f46e5; width: auto; padding: 0.4rem 1.5rem; margin-bottom: 0;">
                    <i class="fa-solid fa-paper-plane"></i> Dispatch Entry
                </button>
            </div>
        </form>
    </main>

    <script>
        const products = @json($products);
        const container = document.getElementById('itemsContainer');
        const addBtn = document.getElementById('addItemBtn');

        function createProductRow() {
            const rowId = Date.now();
            const tr = document.createElement('tr');
            tr.id = `row-${rowId}`;

            let options = '<option value="">-- Select --</option>';
            products.forEach(p => {
                options += `<option value="${p.id}">${p.name} (Rs. ${Number(p.price).toLocaleString()}) [Avl: ${p.stock_quantity}]</option>`;
            });

            tr.innerHTML = `
                <td>
                    <select name="items[${rowId}][product_id]" required style="margin-bottom: 0; padding: 0.25rem;">
                        ${options}
                    </select>
                </td>
                <td>
                    <input type="number" name="items[${rowId}][quantity]" min="1" value="1" required style="margin-bottom: 0; padding: 0.25rem;">
                </td>
                <td style="text-align: center; vertical-align: middle;">
                    <button type="button" style="background: #dc3545; border-color: #dc3545; padding: 0.25rem 0.5rem; margin-bottom: 0;" onclick="document.getElementById('row-${rowId}').remove()">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </td>
            `;
            container.appendChild(tr);
        }

        createProductRow();
        addBtn.addEventListener('click', createProductRow);

        document.getElementById('orderForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const data = { customer_name: formData.get('customer_name'), items: [] };
            const rows = container.querySelectorAll('tr');
            rows.forEach(row => {
                const productId = row.querySelector('select').value;
                const quantity = row.querySelector('input[type="number"]').value;
                if (productId) data.items.push({ product_id: productId, quantity: quantity });
            });

            fetch("{{ route('orders.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(resData => {
                if (resData.error) alert('Error: ' + resData.error);
                else {
                    alert(resData.message);
                    window.location.href = "{{ route('products.index') }}";
                }
            })
            .catch(err => console.error(err));
        });
    </script>
</body>
</html>