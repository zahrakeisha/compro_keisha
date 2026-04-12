@php use Illuminate\Support\Str; @endphp
@extends('template/layout')
@section('title', 'Data Contact Info')
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
                <h3>Contact Info</h3>
                <a href="{{ route('contactinfo.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Add contactinfo</a>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover m-2">
    <thead>
        <tr>
            <th>no</th>
            <th>Name</th>
            <th>Coordinate Point</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contactinfo as $v)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $v->name }}</td>
            @php
            $lat = null;
            $lng = null;

            if (preg_match('/!2d(-?\d+\.\d+)!3d(-?\d+\.\d+)/', $v->gmaps, $match)) {
                $lng = $match[1];
                $lat = $match[2];
            } elseif (preg_match('/!3d(-?\d+\.\d+)!4d(-?\d+\.\d+)/', $v->gmaps, $match)) {
                $lat = $match[1];
                $lng = $match[2];
            } elseif (preg_match('/q=(-?\d+\.\d+),(-?\d+\.\d+)/', $v->gmaps, $match)) {
                $lat = $match[1];
                $lng = $match[2];
            }
            @endphp
            <td>
                {{ $lat && $lng ? $lat . ', ' . $lng : 'Koordinat tidak ditemukan' }}
            </td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->phone }}</td>
            
            <td>{!! Str::limit ($v->address, 60) !!}</td>
            <td>
                @if($v->status == 1)
                <a href="{{ route('contactinfo.nonactive',$v->contactfo_id) }}" class="btn btn-outline-success btn-sm">
                Active
                </a>
                @else
                <a href="{{ route('contactinfo.active',$v->contactfo_id) }}" class="btn btn-outline-danger btn-sm">
                Nonactive
                </a>
                @endif
            </td>

            <td>
                <form action ="{{ route('contactinfo.destroy', $v->contactfo_id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('contactinfo.edit', $v->contactfo_id) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                    <button type="submit" onclick="return confirm('Are you sure want to delete this contactinfo?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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






