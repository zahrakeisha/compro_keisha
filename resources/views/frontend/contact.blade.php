@extends('template/frontend/layoutfront')
@section('content')

<!-- Contact Section -->
<section id="contact" class="contact">
    <h2>Kontak Kami</h2>

    <div class="row">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.770914536696!2d106.788195!3d-6.293809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1dc7550f621%3A0xdf717a01a86a5196!2sIJPK!5e0!3m2!1sid!2sid!4v1769049325060!5m2!1sid!2sid"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="map">
        </iframe>

        <div class="contact-info">
            <div class="info-line">
                <span class="label">Telepon</span>
                <span class="dots">:</span>
                <span class="value">{{ $contacts->phone }}</span>
            </div>

            <div class="info-line">
                <span class="label">WhatsApp</span>
                <span class="dots">:</span>
                <span class="value">Agus 08158779190 &nbsp;·&nbsp; Oji 0838060143294</span>
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