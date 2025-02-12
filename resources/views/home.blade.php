<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
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

        .dropdown-item {
            cursor: pointer;
        }
    </style>
</head>

<body>
    @include('header')

    <div class="hero">
        <div>
            <h2>Welcome, {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h2>
            <p>Access any of the different features here within the site or app.</p>
            <p class="tagline">Pay Less, Eat More!</p>
        </div>
    </div>

    @include('footer')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>

</html>
