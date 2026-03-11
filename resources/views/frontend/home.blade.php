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

    <!-- Wave Pemisah -->
    <div class="hero-wave">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#ffffff"/>
        </svg>
    </div>

</section>

<!-- Section Mitra -->
<section class="mitra-section">
    <div class="mitra-header">
        <h2>Bekerja Sama dengan</h2>
        <p>Mitra Industri</p>
    </div>
    <div class="mitra-track-wrapper">
        <div class="mitra-track">
            <!-- Logo mitra -->
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo1.png') }}" alt="Mitra 1"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo2.png') }}" alt="Mitra 2"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo3.png') }}" alt="Mitra 3"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo4.png') }}" alt="Mitra 4"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo5.png') }}" alt="Mitra 5"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo6.png') }}" alt="Mitra 6"></div>
            <!-- Duplikat untuk seamless loop -->
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo1.png') }}" alt="Mitra 1"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo2.png') }}" alt="Mitra 2"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo3.png') }}" alt="Mitra 3"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo4.png') }}" alt="Mitra 4"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo5.png') }}" alt="Mitra 5"></div>
            <div class="mitra-logo"><img src="{{ asset('images/mitra/logo6.png') }}" alt="Mitra 6"></div>
        </div>
    </div>
</section>

@endsection