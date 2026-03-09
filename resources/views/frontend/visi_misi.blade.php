@extends('template/frontend/layoutfront')
@section('content')

<!-- Visi Misi Section -->
<section class="visi-misi">
    <div class="container-vm">

        <div class="vm-card">
            <h2>Visi</h2>
            <p>{{ $visi->content }}</p>
        </div>

        <div class="vm-card">
            <h2>Misi</h2>
            <ul>
                @foreach($missions as $misi)
                <li>{{ $misi->content }}</li>
                @endforeach
            </ul>
        </div>

    </div>
</section>

@endsection