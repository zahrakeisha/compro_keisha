@extends('template/layout')
@section('title', 'My Profile')

@section('content')

<div class="row">
  <div class="col-md-4">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle"
               src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}"
               alt="User profile picture">
        </div>
        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
        <p class="text-muted text-center">{{ Auth::user()->email }}</p>
      </div>
    </div>
  </div>


  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Profile</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('user.update', Auth::user()->user_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
          </div>
          <hr>
          <h5>Change Password</h5>

          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter new password if you want to change it">
          </div>

          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your new password">
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection