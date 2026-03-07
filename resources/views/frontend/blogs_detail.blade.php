@extends('template/frontend/layoutfront')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="festival-news">

    <h2 class="festival-title">{{ $blogs->title }}</h2>

    <div class="festival-wrapper">

        <!-- Gambar -->
        <div class="festival-image">
            <img src="{{ asset('storage/'.$blogs->thumbnail) }}" alt="festival">
        </div>

    </div>

    <div class="festival-text">

        <p>
            Penulis: {{ $blogs->users->name }}
        </p>

        <p>
            {{ $blogs->content }}
        </p>
    </div>

    <a href="\blogger" class="festival-btn">
        < Back
    </a>

</section>
</body>
</html>

@endsection

