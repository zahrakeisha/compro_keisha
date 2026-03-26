@extends('template/frontend/layoutfront')
@section('content')

<!-- About Section -->
<section id="about" class="about-company">
    <h2>About Us</h2>
    @if(!empty($abouts))
    <div class="about-wrapper">
        <div class="about-profile">
            <img src="{{ asset('storage/'.$abouts->logo) }}" alt="Direktur Utama">
            <h3>{{ $abouts->name }}</h3>
            <span>Direktur Utama</span>
        </div>

        <div class="about-text">
            <p>
                {{ $abouts->description }}
            </p>
        </div>
    </div>

    <hr class="about-line">

    <div class="struktur-organisasi">
        <h2>Structure Organization</h2>
        <div class="struktur-img">
            <img src="{{ asset('storage/'.$abouts->image) }}" alt="Struktur Organisasi PT UJPK">
        </div>
    </div>
    @endif
</section>

@endsection