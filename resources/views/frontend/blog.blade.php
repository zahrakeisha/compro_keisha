@extends('template/frontend/layoutfront')
@section('content')
<!-- About Section -->
 <link rel="stylesheet" href="css/style.css">


<!-- Menu Section  Start-->
 
<section id="news" class="news">
  <h2>Blogs</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim porro temporibus quasi dolore aspernatur.</p>

  <div class="news-list">
    @foreach($blogs as $blog)
    <div class="news-item">
      <img src="{{ asset('storage/'.$blog->thumbnail) }}" alt="news">
      <div class="news-info">
        <h3>{{ $blog->title }}</h3>
        <a href="{{ route('blogs.detail', $blog->blog_id)}}">More Info</a>
      </div>
    </div>
    @endforeach

   

  </div>
</section>

<!-- Menu Section  Start-->

@endsection
