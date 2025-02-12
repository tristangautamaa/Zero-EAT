<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome for Icons -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f5e1;
        }

        .order-details {
            margin-top: 40px;
            text-align: center; 
        }

        .driver-info {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .driver-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-size: cover;
            margin-right: 20px;
        }

        .driver-info h5 {
            margin-top: 0;
        }

        .map-container {
            margin-top: 20px;
            height: 400px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .arrival-estimate {
            margin-top: 20px;
            font-size: 1.2rem;
        }

        .arrival-time {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .arrival-icon {
            margin-right: 10px;
        }

        header {
            padding: 5px 0; 
            margin: 0; 
        }

        .container {
            padding-top: 15px;
            padding-bottom: 10px;
        }

        .footer {
            margin-top: 10px;
        }

        .order-details + .btn {
            margin-top: 30px;
        }

        .hero {
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.1)), 
                              url('{{ asset('images/Home.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
        }

        .hero h2,
        .hero p {
            margin: 0;
        }

        .hero h2 {
            font-size: 3rem;
            font-weight: 600;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8); 
        }

        .hero p {
            font-size: 1.5rem;
            margin-top: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6); 
        }

        .hero .tagline {
            font-size: 1.25rem;
            margin-top: 10px;
            font-style: italic;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }

        .btn-center {
            display: block;
            margin: 30px auto;
            background-color: #006400; 
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            width: 200px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-center:hover {
            background-color: #004d00; 
        }

    </style>
</head>

<body>
    @include('header') 

    <div class="container">
        <h2>Order Tracking</h2>

        <!-- Order Tracking Map -->
        <div class="map-container">
            <iframe
                width="100%"
                height="100%"
                frameborder="0" style="border:0;"
                src="https://www.google.com/maps/embed?
                pb=!1m18!1m12!1m3!1d3960.2728542526626!2d106.65537731537783!3d-6.252717295493716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2
                e4209c927cba907%3A0x28d1b92c3eb3ffb8!2sUniversitas%20Multimedia%20Nusantara!5e0!3m2!1sen!2sid!4v1633950721556!5m2!1sen!2sid" allowfullscreen>
            </iframe>
        </div>

        <!-- Driver Info Section -->
        <div class="driver-info d-flex align-items-center">
            <div class="driver-avatar" style="background-image: url('{{ asset('images/Driver.jpg') }}');">
            </div>
            <div>
                <h5>Driver Name: Jonathan Cahyo</h5>
                <p>Phone: +62 817 209 700</p>
            </div>
        </div>

        <!-- Order Status -->
        <div class="order-details">
            <h4>Status Pesanan: Sedang Diproses</h4>
            
            <!-- Estimasi kedatangan -->
            <div class="arrival-estimate">
                <div class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-clock arrival-icon"></i>
                    <div class="arrival-time">Estimasi Waktu Kedatangan: 15 Menit</div>
                </div>
            </div>
        </div>

        <!-- "Pesanan Diterima" Button -->
        <a href="{{ route('thank.you') }}" class="btn btn-center">Pesanan Diterima</a>
    </div>

    @include('footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>

</html>
