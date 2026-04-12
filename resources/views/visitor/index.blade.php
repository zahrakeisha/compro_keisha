@extends('template/layout')
@section('title', 'Data Visitors')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">
                    Visitors
                </h3>
                <div class="d-flex align-items-center gap-2">
                    <span class="mr-3">
                        Total: <b>{{ $totalFiltered }}</b>
                    </span>

                    <form method="GET">
                        <select name="filter" onchange="this.form.submit()" class="form-control">
                            <option value="all" {{ request('filter','all') == 'all' ? 'selected' : '' }}>All Time</option>
                            <option value="week" {{ request('filter') == 'week' ? 'selected' : '' }}>This Week</option>
                            <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>This Month</option>
                            <option value="year" {{ request('filter') == 'year' ? 'selected' : '' }}>This Year</option>
                        </select>
                    </form>
                </div>
                <form action="{{ route('report.visitor.generate') }}" method="POST" target="_blank" class="">
                        {{csrf_field()}}
                        <input type="hidden" name="filter" value="{{ $filter }}">
                        <button type="submit" class="btn btn-danger mb-3">
                           <i class="fas fa-print"></i> Print PDF
                        </button>
                    </form>
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
                            <td >{{ $v->ip_address }}</td>
                            <td title="{{ $v->user_agent }}">{{ $v->browser_short }}</td>
                            <td title="{{ $v->url }}">{{ $v->url_short }}</td>
                            <td>{{ date('d-m-Y', strtotime($v->created_at)) }}</td>
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









