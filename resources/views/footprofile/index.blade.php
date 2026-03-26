@extends('template/layout')
@section('title', 'Footer Profile')
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
                <h3>Data Footer</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover m-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Instagram</th>
                            <th>Youtube</th>
                            <th>Facebook</th>
                            <th>Status</th>
                            <th>
                                <a href="{{ route('footer.create') }}" class="btn btn-primary btn-sm">+ Add Footer</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($footer as $v)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->description }}</td>
                            <td>{{ $v->instagram }}</td>
                            <td>{{ $v->youtube }}</td>
                            <td>{{ $v->facebook }}</td>
                            <td></td>
                            <td>
                                <form action ="{{ route('footer.destroy', $v->footer_id) }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <a href="{{ route('footer.edit', $v->footer_id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <button type="submit" onclick="return confirm('Are you sure want to delete this Footer?')" class="btn btn-danger btn-sm">Delete</button>
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




