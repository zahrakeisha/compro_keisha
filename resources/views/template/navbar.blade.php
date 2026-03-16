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
    <li class="nav-item dropdown">
      <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
        
        <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg')}}" 
            class="img-circle elevation-2 mr-2" 
            style="width:30px; height:30px;" 
            alt="User Image">

        <span>Hi, {{ Auth::user()->name }}</span>
      </a>

      <div class="dropdown-menu dropdown-menu-right">
        <a href="/profile" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> My Profile
        </a>

        <div class="dropdown-divider"></div>

        <a href="{{ route('logout') }}" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
    @endif

  </ul>

  </nav>