<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <main class="container">
        <header style="margin-bottom: 2rem;">
            <h1>Create New Customer Order</h1>
            <a href="{{ route('products.index') }}">← Back to Inventory</a>
        </header>

        <form id="orderForm">
            <label for="customer_name">Customer Name</label>
            <input type="text" id="customer_name" name="customer_name" placeholder="John Doe" required>

            <h3>Order Items</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="itemsContainer">
                    </tbody>
            </table>

            <button type="button" class="secondary" id="addItemBtn">+ Add Product</button>
            
            <hr>
            <button type="submit">Place Order</button>
        </form>
    </main>

    <script>
        // Store product list passed from Laravel securely as a JSON array
        const products = @json($products);
        const container = document.getElementById('itemsContainer');
        const addBtn = document.getElementById('addItemBtn');

        // Function to create a new dynamic HTML product row
        function createProductRow() {
            const rowId = Date.now();
            const tr = document.createElement('tr');
            tr.id = `row-${rowId}`;

            let options = '<option value="">-- Select Product --</option>';
         // Look for where options are built inside your script tag, switch to Rs. formatting:
products.forEach(p => {
    options += `<option value="${p.id}">${p.name} (Rs. ${Number(p.price).toLocaleString()}) - Stock left: ${p.stock_quantity}</option>`;
});

            tr.innerHTML = `
                <td>
                    <select name="items[${rowId}][product_id]" required class="product-select">
                        ${options}
                    </select>
                </td>
                <td>
                    <input type="number" name="items[${rowId}][quantity]" min="1" value="1" required>
                </td>
                <td>
                    <button type="button" class="contrast" onclick="document.getElementById('row-${rowId}').remove()">Remove</button>
                </td>
            `;
            container.appendChild(tr);
        }

        // Add initial row on page load
        createProductRow();

        // Listen for click to add more product rows
        addBtn.addEventListener('click', createProductRow);

        // Handle AJAX form submission
        document.getElementById('orderForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            // Convert FormData to structured JSON object
            const data = {
                customer_name: formData.get('customer_name'),
                items: []
            };

            // Loop through selected products and quantities
            const rows = container.querySelectorAll('tr');
            rows.forEach(row => {
                const productId = row.querySelector('select').value;
                const quantity = row.querySelector('input[type="number"]').value;
                if (productId) {
                    data.items.push({ product_id: productId, quantity: quantity });
                }
            });

            // Send AJAX request to Laravel backend
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
                alert(resData.message);
            })
            .catch(err => console.error(err));
        });
    </script>
</body>
</html>