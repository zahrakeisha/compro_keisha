@extends('template/frontend/layoutfront')
@section('content')

<!-- VIDEO INTRO -->
<div id="intro-video">
    <video id="videoIntro" autoplay muted playsinline>
        <source src="{{ asset('vidio/home_video.mp4') }}" type="video/mp4">
    </video>
</div>

<!-- Hero Section -->
<section class="hero" id="home">
    
    <!-- Slider -->
    <div class="hero-slider">
        @foreach( $sliders as $slider)
        <div class="slide {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('storage/'.$slider->image) }}" alt="{{ $slider->title }}">
            
            <div class="hero-title">
                <h1>{{ $slider->title }}</h1>
            </div>

            <div class="hero-desc">
                <p>{!! $slider->description !!}</p>
            </div>
        </div>
        @endforeach
        <!-- PANAH -->
        <button class="slider-arrow prev">&#10094;</button>
        <button class="slider-arrow next">&#10095;</button>


        <!-- DOTS -->
        <div class="slider-dots">
            @foreach($sliders as $key => $slider)
            <span class="dot {{ $key == 0 ? 'active' : '' }}" data-slide="{{ $key }}"></span>
            @endforeach
        </div>
    </div>
    <div class="hero-buttons">
    <a href="/contactsfront" class="cta">Contact Us </a>
    <a href="#contact" class="cta-secondary"><i class="fa-solid fa-paper-plane"></i> Get In Touch</a>
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
             @foreach($clients as $client)
            <div class="mitra-logo">
                <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}">
            </div>
            @endforeach
            
            <!-- Duplikat untuk seamless loop -->
            @foreach($clients as $client)
            <div class="mitra-logo">
                <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}">
            </div>
            @endforeach
        </div>
    </div>
</section>


<section id="contact" class="contact">
<div class="contact-form">
    <h3>Leave Us a Message</h3>
    <form action="{{ route('contact.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="mb-3">
            <input type="text" name="name" placeholder="Name">
        </div>
        <div class="mb-3">
            <input type="email" name="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <textarea type="text" name="message" placeholder="Message" rows="5"></textarea>
        </div>
        <button type="submit">Submit Message</button>
    </form>
</div>
</section>

@endsection