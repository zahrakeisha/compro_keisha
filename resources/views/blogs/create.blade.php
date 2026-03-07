@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Data blog</h3>
            </div>
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-tabel">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="thumbnail" class="form-tabel">thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-tabel">content</label>
                    <textarea name="content" id="content" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
    
