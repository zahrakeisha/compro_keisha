@extends('template/layout')
@section('title', 'Data Marketing')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Marketings</h3>
            </div>
            <div class="card-body table-responsive">
<table id="table" class="table table-striped table-hover m-2">
    <thead>
        <tr>
            <th>no</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Marketing Possition</th>
            <th>
                <a href="{{ route('marketing.create') }}" class="btn btn-primary btn-sm">+ Add marketing</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($marketings as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->phone }}</td>
            <td>{{ $v->possition }}</td>
            <td>
                <form action ="{{ route('marketing.destroy', $v->marketing_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('marketing.edit', $v->marketing_id) }}" class="btn btn-success btn-sm">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this marketing?')" class="btn btn-danger btn-sm">Delete</button>
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
