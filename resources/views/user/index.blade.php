@extends('template/layout')
@section('title', 'Data Users')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3>Data User</h3>
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm ml-auto">+ Add user</a>
        </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover m-2">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->name }}</td>
             <td>{{ $v->email }}</td>
            <td>
                <form action ="{{ route('user.destroy', $v->user_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('user.edit', $v->user_id) }}" class="btn btn-success btn-sm">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this user?')" class="btn btn-danger btn-sm">Delete</button>
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








