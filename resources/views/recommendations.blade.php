<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendations</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            margin: 0;
            padding: 0;
        }

        /* Hero Image Section */
        .hero-image {
            position: relative;
            width: 100vw;  
            height: 450px;  
            background: url('{{ asset('images/Hero.jpg') }}') no-repeat center center;
            background-size: 200% auto;  /
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 0;  
            margin: 0;   
            box-shadow: 0px -10px 25px rgba(0, 0, 0, 0.5), 0px 10px 25px rgba(0, 0, 0, 0.5); 
            background-attachment: fixed; 
        }

        .hero-text {
            font-size: 3rem; 
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* Recommendations Section */
        .recommendations-section {
            padding: 60px 0;
            background-color: #fdf6e3; 
        }

        .recommendation-card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .recommendation-card:hover {
            transform: translateY(-5px);
        }

        .card-columns {
            column-count: 3;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .card-columns {
                column-count: 1;
            }
        }

        .card-img-top {
            object-fit: cover;
            width: 100%;
            height: 200px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }

        .distance-rating {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .distance-rating img {
            width: 20px;
            height: auto;
            margin-right: 10px;
        }

        .distance-rating .distance-text {
            font-size: 1rem;
            margin-right: 10px;
        }

        .distance-rating .rating-logo {
            width: 25px;
            height: auto;
        }

        .cloud-container {
            display: flex;
            justify-content: space-between;
            margin: 50px 0;
        }

        .cloud {
            width: 48%;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .cloud-left {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;  
        }

        .cloud-left img {
            width: 45%;
            height: auto;
            border-radius: 15px;
        }

        .cloud-left .text {
            width: 50%;
            padding-left: 20px;
        }

        .cloud-left h4 {
            font-size: 1.75rem;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .cloud-right {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100%;  
        }

        .cloud-right h4 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
        }

        .cloud-right p {
            font-size: 1.2rem;
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>
    @include('header') 

    <!-- Hero Image Section -->
    <div class="hero-image">
        <div class="hero-text">
            Your Perfect Restaurant Awaits
        </div>
    </div>

    <!-- Recommendations Section -->
    <div class="recommendations-section">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Okinawa Sushi Card -->
                <div class="col-md-4 mb-4">
                    <div class="card recommendation-card">
                    <a href="{{ route('products.index') }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset('images/Okinawa.jpg') }}" class="card-img-top" alt="Okinawa Sushi">
                            <div class="card-body">
                                <h5 class="card-title">Okinawa Sushi</h5>
                                <p class="card-text">A sushi restaurant offering fresh and flavorful sushi, sashimi, and more. A perfect spot for sushi lovers!</p>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/distance.png') }}" alt="Distance Icon" style="width: 20px; height: 20px;">
                                    <span class="ml-2">2.5 km</span>
                                    <img src="{{ asset('images/z.png') }}" alt="Rating Icon" class="ml-3" style="width: 20px; height: 20px;">
                                    <span class="ml-1">4.7</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Provence Bakery Card -->
                <div class="col-md-4 mb-4">
                    <div class="card recommendation-card">
                        <img src="{{ asset('images/Provence.jpg') }}" class="card-img-top" alt="Provence">
                        <div class="card-body">
                            <h5 class="card-title">Provence</h5>
                            <p class="card-text">A cozy bakery in Provence offering fresh, flaky pastries and aromatic coffee. Perfect for a relaxing morning!</p>
                            <div class="distance-rating">
                                <img src="{{ asset('images/distance.png') }}" alt="Distance Icon">
                                <span class="distance-text">5.2 km</span>
                                <img src="{{ asset('images/z.png') }}" class="rating-logo" alt="Rating Icon">
                                <span>4.9</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mixue Card -->
                <div class="col-md-4 mb-4">
                    <div class="card recommendation-card">
                        <img src="{{ asset('images/Mixue.jpg') }}" class="card-img-top" alt="Mixue">
                        <div class="card-body">
                            <h5 class="card-title">Mixue</h5>
                            <p class="card-text">A popular ice cream and tea shop offering delicious and refreshing treats. Perfect for a sweet break!</p>
                            <div class="distance-rating">
                                <img src="{{ asset('images/distance.png') }}" alt="Distance Icon">
                                <span class="distance-text">3.8 km</span>
                                <img src="{{ asset('images/z.png') }}" class="rating-logo" alt="Rating Icon">
                                <span>4.5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer') 

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>
