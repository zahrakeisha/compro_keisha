@extends('template/frontend/layoutfront')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT UJPK</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- CSS Tambahan untuk Slider -->
    <style>
        /* Reset dasar untuk Hero Section */
        .hero {
            position: relative;
            height: 100vh; /* Tinggi layar penuh */
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        /* Container untuk gambar-gambar slider */
        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1; /* Di belakang teks */
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Agar gambar memenuhi layar tanpa gepeng */
            filter: brightness(0.6); /* Gelapkan foto sedikit agar tulisan terbaca */
        }

        /* Container untuk Teks (Judul & Deskripsi) */
        .hero-content {
            position: relative;
            z-index: 2; /* Di atas gambar */
            max-width: 800px;
            padding: 20px;
        }

        /* Posisi Judul (Tengah) */
        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            /* Posisi Tepat Tengah */
            top: 50%; 
            transform: translateY(-50%);
        }

        /* Posisi Deskripsi (Agak di bawah tengah) */
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            font-weight: 300;
            /* Posisi sedikit di bawah tengah (55%) */
            top: 55%; 
            transform: translateY(-50%);
        }

        .cta {
            display: inline-block;
            padding: 12px 30px;
            background-color: #ff9800; /* Warna tombol */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
            /* Posisi sedikit di bawah deskripsi */
            top: 60%; 
            transform: translateY(-50%);
        }

        .cta:hover {
            background-color: #e68900;
        }

        /* Animasi Slide CSS */
        @keyframes slideAnimation {
            0% { opacity: 0; }
            10% { opacity: 1; }
            33% { opacity: 1; }
            43% { opacity: 0; }
            100% { opacity: 0; }
        }

        /* Mengatur durasi ganti gambar (misal 5 detik per gambar) */
        .slide:nth-child(1) { animation: slideAnimation 15s infinite; animation-delay: 0s; }
        .slide:nth-child(2) { animation: slideAnimation 15s infinite; animation-delay: 5s; }
        .slide:nth-child(3) { animation: slideAnimation 15s infinite; animation-delay: 10s; }

        /* Responsif untuk HP */
        @media (max-width: 768px) {
            .hero-content h1 { font-size: 1.8rem; }
            .hero-content p { font-size: 1rem; }
        }
    </style>
</head>
<body>

<!-- Navbar Start -->

<!-- Navbar End -->

<!-- Hero Section start-->
<section class="hero" id="home">
    
    <!-- Slider Container -->
    <div class="hero-slider">
        <!-- Ganti src dengan foto Anda sendiri -->
        <div class="slide active">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1920&q=80" alt="Foto Kantor 1">
        </div>
        <div class="slide">
            <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1920&q=80" alt="Foto Kantor 2">
        </div>
        <div class="slide">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80" alt="Foto Kantor 3">
        </div>
    </div>

    <!-- Konten Teks -->
    <main class="hero-content">
        <h1>PT Usaha Jaya Prima <span>Karya</span></h1>
        <p>Solusi Profesional untuk Kebutuhan Bisnis & Teknologi Anda.</p>
        <a href="contact.html" class="cta">Hubungi Kami</a>
    </main>
</section>
<!-- Hero Section end-->

<!-- Feather Icons -->
<script>
    feather.replace();
</script>

<!-- My Javascript -->
<script src="js/script.js"></script>



</body>
</html>

@endsection