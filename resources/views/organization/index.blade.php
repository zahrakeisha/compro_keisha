@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Data organization</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>
                <a href="{{ route('organization.create') }}" class="btn btn-primary btn-sm">+ Add Organization</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($organization as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>
                @if ($v->image)
                <img src="{{ asset('storage/'.$v->image) }}" width="60">
                @else
                -
                @endif
            </td>
            <td>
                <form action ="{{ route('organization.destroy', $v->org_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('organization.edit', $v->org_id) }}" class="btn btn-success btn-sm">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this organization?')" class="btn btn-danger btn-sm">Delete</button>
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




