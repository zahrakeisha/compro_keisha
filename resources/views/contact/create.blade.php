@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Data contact</h3>
            </div>
            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="massage" class="form-label">Message</label>
                    <input type="text" name="message" id="name" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
    
