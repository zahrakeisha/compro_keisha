@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>edit Data contact</h3>
            </div>
            <form action="{{ route('contact.update', $dataeditcontact->contact_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$dataeditcontact->name}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$dataeditcontact->email}}">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <input type="text" name="message" id="message" class="form-control" value="{{$dataeditcontact->message}}">
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
    
