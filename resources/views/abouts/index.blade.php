@extends('template/layout')
@section('title', 'Data About Us')
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
                <h3>Data about</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="table"  class="table table-striped table-hover m-2">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Logo</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>
                <a href="{{ route('about.create') }}" class="btn btn-primary btn-sm">+ Add About us</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($abouts as $v)
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
            <td>
                @if ($v->image)
                <img src="{{ asset('storage/'.$v->image) }}" width="60">
                @else
                -
                @endif
            </td>
            <td>
                @if($v->status == 1)
                <a href="{{ route('about.nonactive',$v->about_id) }}" class="btn btn-danger btn-sm">
                Nonactive
                </a>
                @else
                <a href="{{ route('about.active',$v->about_id) }}" class="btn btn-success btn-sm">
                Active
                </a>
                @endif
            </td>

            <td>
                <form action ="{{ route('about.destroy', $v->about_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('about.edit', $v->about_id) }}" class="btn btn-success btn-sm">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this abouts?')" class="btn btn-danger btn-sm">Delete</button>
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


