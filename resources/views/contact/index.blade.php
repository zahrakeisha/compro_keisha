@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Data contact</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>
                <a href="{{ route('contact.create') }}" class="btn btn-primary btn-sm">+ Add contact</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contact as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->message }}</td>
            <td>
                <form action ="{{ route('contact.destroy', $v->contact_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('contact.edit', $v->contact_id) }}" class="btn btn-success btn sm">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this contact?')" class="btn btn-danger btn-sm">Delete</button>
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


