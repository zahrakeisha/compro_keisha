@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Footer Profile</h3>
            </div>
            <form action="{{ route('footer.update', $dataeditfoot->footer_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$dataeditfoot->name}}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" name="description" id="editor" class="form-control">{{$dataeditfoot->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control" value="{{$dataeditfoot->instagram}}">
                </div>
                <div class="mb-3">
                    <label for="youtube" class="form-label">Youtube</label>
                    <input type="text" name="youtube" id="youtube" class="form-control" value="{{$dataeditfoot->youtube}}">
                </div>
                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control" value="{{$dataeditfoot->facebook}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                <a href="{{ route('footer.index') }}" class="btn btn-secondary btn-sm">Back</a>
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
