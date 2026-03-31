@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Data Service</h3>
            </div>
            <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control form-control @error('image') is-invalid @enderror"" id="image" name="image">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor" rows="5">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="{{ route('service.index') }}" class="btn btn-secondary btn-sm">Back</a>
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



    
    
