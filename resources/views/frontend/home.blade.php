@extends('template/frontend/layoutfront')
@section('content')

<!-- Hero Section -->
<section class="hero" id="home">
    @foreach( $sliders as $slider)
    <!-- Slider -->
    <div class="hero-slider {{ $loop->first ? 'active' : '' }}">
        <div class="slide active">
            <img src="{{ asset('storage/'.$slider->image) }}" alt="{{ $slider->title }}">
        </div>
    </div>

    <!-- Konten -->
    <div class="hero-content">
        <h1>{{ $slider->title }}</h1>
        <p>{{ $slider->description }}</p>
        <a href="/contactsfront" class="cta">Hubungi Kami</a>
    </div>
    
    @endforeach
   

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