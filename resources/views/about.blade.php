<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- FontAwesome Icons -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f5f5dc; 
        }

        .about-section {
            text-align: center;
            padding: 60px 20px;
            background-color: #f5f5dc;
        }

        .about-section h2 {
            font-size: 36px;
            font-weight: 600;
            color: #006400;
        }

        .about-section p {
            font-size: 18px;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
        }

        .purpose-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 40px 0;
        }

        .purpose-item {
            background-color: white;
            padding: 30px;
            width: 280px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .purpose-item:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .purpose-item h4 {
            font-size: 24px;
            font-weight: 600;
            color: #006400;
            margin-bottom: 15px;
        }

        .purpose-item p {
            font-size: 16px;
            color: #333;
        }

        .purpose-item i {
            font-size: 40px;
            color: #006400;
            margin-bottom: 15px;
        }

        .hashtag-section {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .hashtag-section h3 {
            font-size: 30px;
            color: #006400;
        }

        .hashtag-section p {
            font-size: 18px;
            color: #333;
        }

        .footer {
            background-color: #004d1a;
            color: white;
            padding: 10px 0;
            position: relative;
            width: 100%;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
            margin-top: auto;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            color: #80e27e;
        }

        .social-icons {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin: 0;
        }

        .social-icons li {
            margin: 0 10px;
        }

        .social-icons a {
            text-decoration: none;
            color: white;
            font-size: 20px;
        }

        .social-icons a:hover {
            color: #80e27e;
        }
    </style>
</head>

<body>
    @include('header') 

    <div class="about-section">
        <h2>Tentang Kami</h2>
        <p>Buang makanan adalah kegagalan pasar yang membuang lebih dari 1 triliun dolar AS makanan setiap tahun. Ini juga merupakan kegagalan lingkungan: 
            Limbah makanan diperkirakan menghasilkan 8-10% dari emisi gas rumah kaca global, dan menghabiskan hampir 30% dari lahan pertanian dunia.</p>
    </div>

    <div class="purpose-section">
        <div class="purpose-item">
            <i class="fas fa-utensils"></i> 
            <h4>Menyelamatkan Makanan</h4>
            <p>Kami bertujuan untuk mengurangi limbah makanan dengan menghubungkan konsumen dengan makanan yang berlebih secara berkelanjutan.</p>
        </div>
        <div class="purpose-item">
            <i class="fas fa-cogs"></i> 
            <h4>Mengembangkan Fitur Terintegrasi</h4>
            <p>ZEAT mengembangkan fitur terintegrasi untuk mempermudah dan meningkatkan efisiensi pengelolaan makanan bagi pengguna.</p>
        </div>
        <div class="purpose-item">
            <i class="fas fa-users"></i> 
            <h4>Menyinergikan Berbagai MSME</h4>
            <p>Kami bekerja sama dengan usaha kecil dan menengah (UMKM) untuk menawarkan pilihan makanan berkualitas dan ramah lingkungan.</p>
        </div>
        <div class="purpose-item">
            <i class="fas fa-globe-americas"></i> 
            <h4>Menyelamatkan Dunia</h4>
            <p>Tujuan kami adalah meminimalkan limbah makanan, mengurangi dampak lingkungan, dan berkontribusi pada masa depan yang berkelanjutan bagi semua.</p>
        </div>
    </div>

    <div class="hashtag-section">
        <h3>#PayLessEatMore</h3>
        <p>Bergabunglah dalam gerakan untuk mengurangi limbah makanan dan menghemat uang. Bersama-sama, kita bisa membuat perbedaan!</p>
    </div>

    @include('footer') 

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>
