@extends('template/frontend/layoutfront')
@section('content')

<!-- Contact Section -->
<section id="contact" class="contact">
    <h2>Kontak Kami</h2>

    <div class="row">
        {!! $contacts->gmaps !!}

        <div class="contact-info">
            <div class="info-line">
                <span class="label">Telepon</span>
                <span class="dots">:</span>
                <span class="value">{{ $contacts->phone }}</span>
            </div>

            <div class="info-line">
                <span class="label">Marketings</span>
                <span class="dots">:</span>
                <span class="value">
                    @foreach( $marketings as $marketing )
                    <div>
                        {{ $marketing->name }} - {{ $marketing->phone }}
                    </div>
                    @endforeach
                </span>
            </div>

            <div class="info-line">
                <span class="label">Email</span>
                <span class="dots">:</span>
                <span class="value">{{ $contacts->email }}</span>
            </div>

            <h3>Office</h3>
            <p>{{ $contacts->address }}</p>
        </div>

    </div>
</section>

@endsection
