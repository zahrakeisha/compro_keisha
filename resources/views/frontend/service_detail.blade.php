@extends('template/frontend/layoutfront')
@section('content')

 <section class="adn-section">
    <div class="adn-header">
        <h2>{{ $servicesdetail->title }}</h2>
    </div>

    <div class="festival-wrapper">
        <div class="festival-image">
            <img src="{{ asset('storage/'.$servicesdetail->image) }}" alt="{{ $servicesdetail->title }}">
        </div>
    </div>
    

    <div class="adn-content">
        <!-- bagian kiri -->
         <div class="adn-text">
            <p> 
                {{ $servicesdetail->description }}
            </p>
         </div>
    </div>
</section>

@endsection

