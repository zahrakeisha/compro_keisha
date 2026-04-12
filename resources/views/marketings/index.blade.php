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
            <div class="card-header d-flex align-items-center">
                <h3>Data Marketings</h3>
                <a href="{{ route('marketing.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Add marketing</a>
            </div>
            <div class="card-body table-responsive">
<table id="table" class="table table-striped table-hover m-2">
    <thead>
        <tr>
            <th>no</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Status</th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($marketings as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->phone }}</td>
            <td>
                @if($v->status == 1)
                <a href="{{ route('marketing.nonactive',$v->marketing_id) }}" class="btn btn-outline-success btn-sm">
                Active
                </a>
                @else
                <a href="{{ route('marketing.active',$v->marketing_id) }}" class="btn btn-outline-danger btn-sm">
                Nonactive
                </a>
                @endif
            </td>
            <td>
                <form action ="{{ route('marketing.destroy', $v->marketing_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('marketing.edit', $v->marketing_id) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this marketing?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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
