@extends('template/frontend/layoutfront')
@section('content')

<!-- Blog Section -->
<section id="news" class="news">
    <h2>Blog</h2>
    <p>Berita, artikel, dan informasi terkini dari PT UJPK.</p>

    <div class="news-list">
        @foreach($blogs as $blog)
        <div class="news-item">
            <img src="{{ asset('storage/'.$blog->thumbnail) }}" alt="{{ $blog->title }}">
            <div class="news-info">
                <h3>{{ $blog->title }}</h3>
                <a href="{{ route('blogs.detail', $blog->blog_id) }}">Baca Selengkapnya</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection