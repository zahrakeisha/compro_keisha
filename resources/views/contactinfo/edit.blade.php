@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>edit Info Contact</h3>
            </div>
            <form action="{{ route('contactinfo.update', $contactinfo->contactfo_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$contactinfo->name}}">
                </div>
                <div class="mb-3">
                    <label for="gmaps" class="form-label">Gmaps</label>
                    <textarea type="text" name="gmaps" id="gmaps" class="form-control" value="{{$contactinfo->gmaps}}"></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$contactinfo->email}}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{$contactinfo->phone}}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea type="text" name="address" id="address" class="form-control" value="{{$contactinfo->address}}"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection