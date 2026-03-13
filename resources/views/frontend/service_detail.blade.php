@extends('template/frontend/layoutfront')
@section('content')

<section class="service-section">
    <div class="service-header">
        <h2>{{ $servicesdetail->title }}</h2>
    </div>

    <div class="service-wrapper">
        <div class="service-image">
            <img src="{{ asset('storage/'.$servicesdetail->image) }}" alt="{{ $servicesdetail->title }}">
        </div>
        <div class="service-text">
            <p>{{ $servicesdetail->description }}</p>
        </div>
    </div>
</section>

@endsection