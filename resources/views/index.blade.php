<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Okinawa Sushi Menu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #f8f5e1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            font-size: 22px;
            margin-top: 10px;
        }

        .menu-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .food-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
        }

        .food-item img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            margin-right: 12px;
            border-radius: 8px;
        }

        .food-info {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .food-item h5 {
            font-size: 16px;
            font-weight: bold;
        }

        .food-item .price {
            font-size: 14px;
            text-decoration: line-through;
            color: #888;
        }

        .food-item .discount-price {
            font-size: 16px;
            font-weight: bold;
            color: #006400;
        }

        .add-to-cart-btn {
            background-color: #006400;
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            width: auto;
        }

        a.btn-primary {
            background-color: #006400 !important;
            color: white !important;
            border: none;
            text-align: center;
            display: block;
            margin: 20px auto;
            width: 200px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        a.btn-primary:hover {
            background-color: #004d00 !important;
        }
    </style>
</head>

<body>

    @include('header')

    <div class="container">
        <h2>Okinawa Sushi Menu</h2>

        <div class="menu-content">
            @foreach ($products as $product)
            <div class="food-item">
                <img src="{{ asset('images/' . $product->image_url) }}" alt="{{ $product->name }}">
                <div class="food-info">
                    <h5>{{ $product->name }}</h5>
                    <div>
                        <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="discount-price">Rp {{ number_format($product->discount_price, 0, ',', '.') }}</span>
                    </div>
                    <div>
                        <span><strong>Komposisi:</strong> {{ $product->description }}</span>
                        <span><strong>Kadaluarsa:</strong> {{ $product->expiration_period }}</span>
                    </div>
                </div>
                <button 
                    class="add-to-cart-btn" 
                    data-id="{{ $product->id }}" 
                    data-name="{{ $product->name }}" 
                    data-price="{{ $product->discount_price }}" 
                    data-image="{{ asset('images/' . $product->image_url) }}">
                    Add to Cart
                </button>
            </div>
            @endforeach
        </div>

        <a href="{{ route('cart') }}" class="btn btn-primary">Checkout</a>
    </div>

    @include('footer')

    <script>
        document.querySelectorAll('.add-to-cart-btn').forEach((button) => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = parseFloat(this.getAttribute('data-price'));
                const productImage = this.getAttribute('data-image');

                let cartItems = JSON.parse(localStorage.getItem('cart')) || [];

                let existingItem = cartItems.find((item) => item.id === productId);
                if (existingItem) {
                    existingItem.quantity += 1; 
                } else {
                    cartItems.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        image: productImage,
                        quantity: 1,
                    });
                }

                localStorage.setItem('cart', JSON.stringify(cartItems));
                alert(`${productName} has been added to the cart!`);
            });
        });
    </script>
</body>

</html>
