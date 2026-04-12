@php use Illuminate\Support\Str; @endphp
@extends('template/layout')
@section('title', 'Data Services')
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
                <h3>Data Service</h3>
                <a href="{{ route('service.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Add Service</a>

            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover m-2">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Image</th>
            <th>Description</th>
           
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->title }}</td>
            <td>{{ $v->slug }}</td>
            <td>
                <img src="{{ asset('storage/'.$v->image) }}" width="60">
            </td>
            <td>{!! Str::limit ($v->description, 60) !!}</td>
           
            <td>
                <form action ="{{ route('service.destroy', $v->service_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('service.edit', $v->service_id) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this service?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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




