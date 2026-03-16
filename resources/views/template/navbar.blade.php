 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-flex align-items-center mr-3">
      <span id="today-date"></span>
    </li>

    @if (Auth::user())
    <li class="nav-item d-flex align-items-center">
      <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2 mr-2" style="width:30px; height:30px;" alt="User Image">

      <span class="font-weight">Hi, {{ Auth::user()->name }}</span>
    </li>
    @endif

  </ul>

  </nav>