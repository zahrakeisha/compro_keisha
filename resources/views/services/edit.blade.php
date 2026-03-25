@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Data Service</h3>
            </div>
            <form action="{{ route('service.update', $dataeditservice->service_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$dataeditservice->title}}"required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" value="{{$dataeditservice->image}}"required>
                </div>
                <div class="form-group">
                        @if($dataeditservice->image)
                        <label for="image" class="form-label">Preview Photo</label>
                        <img src="{{ asset('storage/' . $dataeditservice->image) }}"
                            alt="{{ $dataeditservice->title }}" class="img-thumbnail" width="200"></p>
                        @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="5">{{ $dataeditservice->description }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-block">Update</button>
                <a href="{{ route('service.index') }}" class="btn btn-secondary btn-block">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
    
