@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Data User</h3>
            </div>
            <form action="{{ route('user.update', $dataedituser->user_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$dataedituser->name}}"required>
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{$dataedituser->email}}"required>
                <label>password</label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection





    
    
