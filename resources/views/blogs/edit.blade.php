@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Data blog</h3>
            </div>
            <form action="{{ route('blog.update', $dataeditblog->blog_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$dataeditblog->title}}">
                </div>
                <div class="mb-3">
                    <label for="thumnail" class="form-label">thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" value="{{$dataeditblog->thumbnail}}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">content</label>
                    <textarea name="content" id="content" class="form-control">{{$dataeditblog->content}}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-block">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
