@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h3>Edit Data Sliders</h3></div>
            <form action="{{ route('sliders.update', $sliders->sliders_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$sliders->title}}">
                @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{$sliders->description}}</textarea>
                @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                <a href="{{ route('sliders.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

    
