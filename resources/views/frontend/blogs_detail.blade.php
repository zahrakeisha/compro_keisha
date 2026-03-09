@extends('template/frontend/layoutfront')
@section('content')

<!-- Blog Detail -->
<section class="festival-news">

    <h2 class="festival-title">{{ $blogs->title }}</h2>

    <div class="festival-wrapper">
        <div class="festival-image">
            <img src="{{ asset('storage/'.$blogs->thumbnail) }}" alt="{{ $blogs->title }}">
        </div>
    </div>

    <div class="festival-text">
        <p>Penulis: {{ $blogs->users->name }}</p>
        <p>{{ $blogs->content }}</p>
    </div>

    <a href="/blogger" class="festival-btn">← Kembali ke Blog</a>

</section>

@endsection