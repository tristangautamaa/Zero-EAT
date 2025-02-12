<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
    /* Body Background Color */
    body {
        background-color: #f8f5e1;
    }

    /* Main Hero Section */
    .hero {
        position: relative;
        background: url('{{ asset('images/Achievements.jpg') }}') no-repeat center center;
        background-size: cover;
        height: 60vh;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }

    .hero::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 0.5) 100%);
        z-index: 1;
    }

    .hero-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 3rem;
        font-weight: 600;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
        z-index: 2;
    }

    /* Cloud Section */
    .cloud-container {
        display: flex;
        justify-content: space-between;
        margin: 50px 0;
    }

    .cloud {
        width: 48%;
        background-color: rgba(255, 255, 255, 0.8); 
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .cloud-left {
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    /* Second Cloud - Centered Content */
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

    <!-- Main Hero Section -->
    <div class="hero">
        <div class="hero-text">Achievements</div>
    </div>

    <!-- Content Section with two "clouds" -->
    <div class="container mt-5">
        <div class="cloud-container">
            <!-- First Cloud with Image and Text -->
            <div class="cloud cloud-left">
                <img src="{{ asset('images/SDG12.png') }}" alt="SDG Image">
                <div class="text">
                    <h4>Food Saved and SDG Impact</h4>
                    <p>SDGs ke-12 fokus pada konsumsi dan produksi berkelanjutan, efisiensi 
                        sumber daya, pengurangan limbah, dan dampak lingkungan yang minimal.</p>
                </div>
            </div>

            <!-- Second Cloud with People Helped -->
            <div class="cloud cloud-right">
                <div>
                    <h4>85%</h4>
                    <p>Peluang makanan terselamatkan setiap harinya!</p>
                </div>
            </div>
        </div>
    </div>

    @include('footer') 

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>

</html>
