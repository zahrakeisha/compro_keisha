@php use Illuminate\Support\Str; @endphp
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
            <div class="card-header d-flex align-items-center">
                <h3>Data Footer</h3>
                <a href="{{ route('footer.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Add Footer</a>
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
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($footer as $v)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $v->name }}</td>
                            <td>{!! $v->description !!}</td>
                            <td>{{ Str::limit ($v->instagram,15) }}</td>
                            <td>{{ Str::limit ($v->youtube,15) }}</td>
                            <td>{{ Str::limit ($v->facebook,15) }}</td>
                            <td>
                                @if($v->status == 1)
                                <a href="{{ route('footer.nonactive',$v->footer_id) }}" class="btn btn-outline-success btn-sm">
                                Active
                                </a>
                                @else
                                <a href="{{ route('footer.active',$v->footer_id) }}" class="btn btn-outline-danger btn-sm">
                                Nonactive
                                </a>
                                @endif
                            </td>
                            <td>
                                <form action ="{{ route('footer.destroy', $v->footer_id) }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <a href="{{ route('footer.edit', $v->footer_id) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                                    <button type="submit" onclick="return confirm('Are you sure want to delete this Footer?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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




