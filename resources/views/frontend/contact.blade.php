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
        
        <div class="contact-form">
            <h3>Kirim Pesan</h3>
            <form action="{{ route('contact.store') }}" method="POST">
            {{csrf_field()}}
            <div class="mb-3">
                <input type="text" name="name" placeholder="Nama">
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="text" name="message" placeholder="Pesan">
            </div>
            <button type="submit">Kirim</button>
            </form>
        </div>

    </div>
</section>

@endsection
