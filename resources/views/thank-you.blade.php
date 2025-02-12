<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f5e1;
            margin: 0;
            padding: 0;
        }

        .thank-you-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            padding-top: 80px;
            padding-bottom: 50px;
        }

        .thank-you-img {
            width: 40%;
            max-width: 400px;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 3rem;
            font-weight: 600;
        }

        p {
            font-size: 1.5rem;
        }

        .star-rating {
            font-size: 3rem;
            cursor: pointer;
            display: inline-block;
            margin-bottom: 30px;
        }

        .star-rating .star {
            width: 50px; 
            height: 50px;
            display: inline-block;
            margin: 5px;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            border: 14px solid #006400; 
            background-color: transparent;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .star-rating .filled {
            background-color: #006400; 
        }

        .review-btn {
            display: none;
            background-color: #006400;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 30px; 
            cursor: pointer;
            width: 100%; 
            max-width: 350px; 
        }

        .review-btn:hover {
            background-color: #004d00;
        }

        
        footer {
            margin-top: 60px; 
        }
    </style>
</head>

<body>
    @include('header') 

    <!-- Content -->
    <div class="thank-you-container">
        <img src="{{ asset('images/VG.png') }}" class="thank-you-img" alt="Thank You">
        <h2>Terima Kasih!</h2>
        <p>Anda telah menyelamatkan lebih banyak makanan!</p>

        <!-- Rating Section -->
        <div class="star-rating" id="star-rating">
            <span class="star" data-value="1"></span>
            <span class="star" data-value="2"></span>
            <span class="star" data-value="3"></span>
            <span class="star" data-value="4"></span>
            <span class="star" data-value="5"></span>
        </div>

        <!-- Submit Button Container -->
        <div class="review-btn-container">
            <button class="review-btn" id="submit-review" onclick="window.location.href='{{ route('home') }}'">Kirim Ulasan</button>
        </div>
    </div>

    @include('footer')

    <script>
        let stars = document.querySelectorAll('.star');
        let selectedRating = 0;

        stars.forEach(star => {
            star.addEventListener('click', function() {
                selectedRating = this.getAttribute('data-value');
                updateStarRating(selectedRating);
                document.getElementById('submit-review').style.display = 'block'; 
            });
        });

        function updateStarRating(rating) {
            stars.forEach(star => {
                if (star.getAttribute('data-value') <= rating) {
                    star.classList.add('filled'); 
                } else {
                    star.classList.remove('filled'); 
                }
            });
        }
    </script>

</body>

</html>
