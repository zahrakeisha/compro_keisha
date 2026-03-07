@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Clients</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Logo</th>
            <th>Description</th>
            <th>Services Category</th>
            <th>
                <a href="{{ route('client.create') }}" class="btn btn-primary btn-sm">+ Add Client</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->name }}</td>
            <td>
                @if ($v->logo)
                <img src="{{ asset('storage/'.$v->logo) }}" width="60">
                @else
                -
                @endif
            </td>
            <td>{{ $v->description }}</td>
            <td>{{ $v->services->title ?? '-' }}</td>
            <td>
                <form action ="{{ route('client.destroy', $v->clients_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('client.edit', $v->clients_id) }}" class="btn btn-success btn-sm">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this client?')" class="btn btn-danger btn-sm">Delete</button>
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







