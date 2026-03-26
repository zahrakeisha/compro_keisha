@extends('template/layout')
@section('title', 'Data Visions&Missions')

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
                <h3>Data vision & missions</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover m-2">
    <thead>
        <tr>
            <th>No</th>
            <th>Type</th>
            <th>Content</th>
            <th>status</th>
            <th>
                <a href="{{ route('visions.create') }}" class="btn btn-primary btn-sm">+ Add</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visions_missions as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->type }}</td>
            <td>{{ $v->content }}</td>
            <td>
                @if($v->status == 1)
                <a href="{{ route('visions.nonactive',$v->vs_id) }}" class="btn btn-outline-success btn-sm">
                Active
                </a>
                @else
                <a href="{{ route('visions.active',$v->vs_id) }}" class="btn btn-outline-danger btn-sm">
                Nonactive 
                </a>
                @endif
            </td>
            <td>
                <form action ="{{ route('visions.destroy', $v->vs_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('visions.edit', $v->vs_id) }}" class="btn btn-success btn-sm">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this {{ ucfirst($v->type) }}?')" class="btn btn-danger btn-sm">Delete</button>
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




