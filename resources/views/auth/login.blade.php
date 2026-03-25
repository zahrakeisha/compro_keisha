<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UJPK | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css')}}">

  <style>
  body.login-page {
    background: linear-gradient(135deg, #eef2f7, #dbe6f6);
  }

  .login-box {
    width: 380px;
  }

  .login-logo a {
    font-weight: 600;
    font-size: 26px;
    color: #2c3e50;
  }

  /* Card transparan modern */
  .card {
    border-radius: 16px;
    border: none;
    background: rgba(255, 255, 255, 0.65);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
  }

  .login-card-body {
    background: transparent;
    padding: 32px;
  }

  .login-box-msg {
    font-size: 14px;
    color: #555;
    margin-bottom: 20px;
  }

  .form-control {
    border-radius: 8px;
  }

  .input-group-text {
    border-radius: 0 8px 8px 0;
    background: #f4f6f9;
  }

  .btn-primary {
    border-radius: 8px;
    padding: 10px;
    font-weight: 500;
    transition: 0.2s;
  }

  .btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.12);
  }
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="">PT Usaha Jaya Prima<b>Karya</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{route('login.proseslogin')}}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
</body>
</html