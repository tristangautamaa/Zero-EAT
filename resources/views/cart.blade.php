<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja Anda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f5e1;
        }

        h2 {
            margin-top: 40px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 15px;
            border-radius: 8px;
        }

        .item-info {
            flex: 1;
        }

        .item-info h5 {
            margin: 0;
            font-size: 1.1em;
            font-weight: bold;
        }

        .item-info .item-price {
            color: #006400;
            font-weight: bold;
        }

        .total-section {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .button-container {
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .error {
            color: red;
            margin-top: 5px;
            font-size: 0.9em;
        }
    </style>
</head>

<body>

    @include('header')

    <div class="container">
        <h2>Keranjang Belanja Anda</h2>

        <!-- Cart Items Section -->
        <div id="cart-items"></div>

        <!-- Address Section -->
        <div class="total-section">
            <h4>Alamat Pengiriman</h4>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                <small class="error" id="name-error"></small>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control" id="address" placeholder="Masukkan alamat pengiriman Anda"></textarea>
                <small class="error" id="address-error"></small>
            </div>
            <div class="form-group">
                <label for="city">Kota</label>
                <input type="text" class="form-control" id="city" placeholder="Masukkan kota Anda">
                <small class="error" id="city-error"></small>
            </div>
            <div class="form-group">
                <label for="postal-code">Kode Pos</label>
                <input type="text" class="form-control" id="postal-code" placeholder="Masukkan kode pos Anda">
                <small class="error" id="postal-code-error"></small>
            </div>
        </div>

        <!-- Cart Summary and Total Section -->
        <div class="total-section">
            <h4>Ringkasan Pesanan</h4>
            <div id="cart-summary"></div>
            <hr>
            <div class="d-flex justify-content-between">
                <span><strong>Total Pembelian:</strong></span>
                <span id="total-amount">Rp 0</span>
            </div>
        </div>

        <!-- Button Container -->
        <div class="button-container">
            <button id="proceed-button" class="btn btn-success">Proceed to Order</button>
        </div>
    </div>

    @include('footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('proceed-button').addEventListener('click', function(event) {
            event.preventDefault();

            // Get form values
            const name = document.getElementById('name').value.trim();
            const address = document.getElementById('address').value.trim();
            const city = document.getElementById('city').value.trim();
            const postalCode = document.getElementById('postal-code').value.trim();

            // Error elements
            const nameError = document.getElementById('name-error');
            const addressError = document.getElementById('address-error');
            const cityError = document.getElementById('city-error');
            const postalCodeError = document.getElementById('postal-code-error');

            // Reset error messages
            nameError.textContent = '';
            addressError.textContent = '';
            cityError.textContent = '';
            postalCodeError.textContent = '';

            let isValid = true;

            // Validate fields
            if (!name) {
                nameError.textContent = 'Nama lengkap harus diisi.';
                isValid = false;
            }

            if (!address) {
                addressError.textContent = 'Alamat harus diisi.';
                isValid = false;
            }

            if (!city) {
                cityError.textContent = 'Kota harus diisi.';
                isValid = false;
            }

            if (!postalCode) {
                postalCodeError.textContent = 'Kode pos harus diisi.';
                isValid = false;
            }

            if (isValid) {
                alert('Form berhasil diisi. Melanjutkan ke halaman order.');
                window.location.href = "{{ route('order') }}";
            }
        });

        function formatRupiah(angka) {
            return angka.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).replace('Rp', 'Rp ').replace(',', '.');
        }

        window.onload = function() {
            loadCartItems();
        };

        function loadCartItems() {
            let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            let cartContainer = $('#cart-items');
            let cartSummary = $('#cart-summary');
            let totalAmount = 0;

            cartContainer.empty();
            cartSummary.empty();

            cartItems.forEach((item, index) => {
                let image = item.image || "{{ asset('images/Nigiri.jpg') }}";
                let itemTotal = item.price * item.quantity;
                totalAmount += itemTotal;

                let itemHtml = `
                    <div class="cart-item">
                        <img src="${image}" alt="${item.name}">
                        <div class="item-info">
                            <h5>${item.name}</h5>
                            <span class="item-price">${formatRupiah(itemTotal)}</span>
                            <div>
                                <span>Kuantitas: ${item.quantity}</span>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-warning btn-sm edit-btn" data-index="${index}">Edit</button>
                            <button class="btn btn-danger btn-sm delete-btn" data-index="${index}">Hapus</button>
                        </div>
                    </div>
                `;
                cartContainer.append(itemHtml);

                let summaryHtml = `
                    <div>
                        <img src="${image}" alt="${item.name}" style="width: 50px; height: 50px; margin-right: 10px;">
                        <span>${item.name} (x${item.quantity})</span> - ${formatRupiah(itemTotal)}
                    </div>
                `;
                cartSummary.append(summaryHtml);
            });

            $('#total-amount').text(formatRupiah(totalAmount));

            $('.edit-btn').on('click', editCartItem);
            $('.delete-btn').on('click', deleteCartItem);
        }

        function editCartItem() {
            let index = $(this).data('index');
            let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            let item = cartItems[index];

            let newQuantity = prompt(`Edit quantity for ${item.name}:`, item.quantity);
            if (newQuantity !== null && !isNaN(newQuantity) && newQuantity > 0) {
                cartItems[index].quantity = parseInt(newQuantity, 10);
                localStorage.setItem('cart', JSON.stringify(cartItems));
                loadCartItems();
            } else if (newQuantity !== null) {
                alert('Invalid quantity entered!');
            }
        }

        function deleteCartItem() {
            let index = $(this).data('index');
            let cartItems = JSON.parse(localStorage.getItem('cart')) || [];

            cartItems.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cartItems));
            loadCartItems();
        }
    </script>

</body>

</html>
