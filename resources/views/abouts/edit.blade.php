@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>edit Data about us</h3>
            </div>
            <form action="{{ route('about.update', $abouts->about_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-tabel">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$abouts->name}}">
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-tabel">Direktur Utama</label>
                    <input type="file" name="logo" id="logo" class="form-control " value="{{$abouts->logo}}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                        @if($abouts->image)
                        <label for="logo" class="form-label">Preview Photo</label>
                        <img src="{{ asset('storage/' . $abouts->logo) }}"
                            alt="{{ $abouts->title }}" class="img-thumbnail" width="200"></p>
                        @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-tabel">Description</label>
                    <textarea name="description" id="editor" class="form-control @error('description') is-invalid @enderror">{{$abouts->description}}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-tabel">Structure Organization</label>
                    <input type="file" name="image" id="image" class="form-control" value="{{$abouts->image}}">
                </div>
                <div class="form-group">
                        @if($abouts->image)
                        <label for="image" class="form-label">Preview Photo</label>
                        <img src="{{ asset('storage/' . $abouts->image) }}"
                            alt="{{ $abouts->title }}" class="img-thumbnail" width="200"></p>
                        @endif
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                <a href="{{ route('about.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>
@endpush

