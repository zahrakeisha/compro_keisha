@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Blogs</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>User</th>
            <th>Slug</th>
            <th>Thumbnail</th>
            <th>Content</th>
            <th>
                <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">+ Add blog</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blog as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->title }}</td>
            <td>{{ $v->users->name ?? '-' }}</td>
            <td>{{ $v->slug }}</td>
            <td>
                @if ($v->thumbnail)
                <img src="{{ asset('storage/'.$v->thumbnail) }}" width="60">
                @else
                -
                @endif
            </td>
            <td>{{ $v->content }}</td>
            <td>
                <form action ="{{ route('blog.destroy', $v->blog_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('blog.edit', $v->blog_id) }}" class="btn btn-success btn-sm">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this blog?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    new DataTable('#table');
</script>
@endpush




