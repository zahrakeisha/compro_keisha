@extends('template/layout')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Data User</h3>
            </div>

             <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                 <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection