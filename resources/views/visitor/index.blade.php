@extends('template/layout')
@section('title', 'Data Visitors')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Visitors</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover m-2">
    <thead>
        <tr>
            <th>No</th>
            <th>IP Address</th>
            <th>Browser</th>
            <th>URL</th>
            <th>Visited At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($visitor as $v)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->ip_address }}</td>
            <td>{{ $v->user_agent }}</td>
            <td>{{ $v->url }}</td>
            <td>{{ $v->created_at }}</td>
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









