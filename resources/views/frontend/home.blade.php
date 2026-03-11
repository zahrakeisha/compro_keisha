@extends('template/frontend/layoutfront')
@section('content')

<!-- Hero Section -->
<section class="hero" id="home">

    <!-- Slider -->
    <div class="hero-slider">
        <div class="slide active">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1920&q=80" alt="Kantor 1">
        </div>
        <div class="slide">
            <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1920&q=80" alt="Kantor 2">
        </div>
        <div class="slide">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80" alt="Kantor 3">
        </div>
    </div>

    <!-- Konten -->
    <div class="hero-content">
        <h1>PT Usaha Jaya Prima <span>Karya</span></h1>
        <p>Solusi Profesional untuk Kebutuhan Bisnis &amp; Teknologi Anda.</p>
    </div>

</section>

@endsection