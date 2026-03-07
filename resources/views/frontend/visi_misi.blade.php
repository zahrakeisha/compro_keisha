@extends('template/frontend/layoutfront')
@section('content')

<!-- About Section -->
 <link rel="stylesheet" href="css/style.css">

<section class="visi-misi">
  <div class="container-vm">

    <div class="vm-card">
      <h2>Vision</h2>
      <p>
        {{ $visi->content }}
      </p>
    </div>

    <div class="vm-card">
      <h2>Mission</h2>
      <ul>
        @foreach($missions as $misi)
        <li>{{ $misi->content}}</li>
        @endforeach
      </ul>
    </div>

  </div>
</section>

@endsection
