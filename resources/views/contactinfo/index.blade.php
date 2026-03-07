@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3>Data info contact</h3>
                <a href="{{ route('contactinfo.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Add contactinfo</a>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>no</th>
            <th>Name</th>
            <th>Gmaps</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contactinfo as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->gmaps }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->phone }}</td>
            <td>{{ $v->address }}</td>
            <td>
                <form action ="{{ route('contactinfo.destroy', $v->contactfo_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('contactinfo.edit', $v->contactfo_id) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i> Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this contactinfo?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
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






