 <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Company Profile</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if (Auth::user())
          <a href="#" class="d-block">{{ Auth::user()->email}}</a>
          @endif
 
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-link" aria-hidden="true"></i>
              <p>
                Lihat Website
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('user*','sliders*','visions*','service*','organization*','marketing*','blog*','contactinfo*','client*','about*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('user*','sliders*','visions*','service*','organization*','marketing*','blog*','contactinfo*','client*','about*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/user" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/sliders" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/visions" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Visions Missions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/service" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/organization" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Organization</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/marketing" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Marketings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/blog" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Blogs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/contactinfo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Contact Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/client" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Clients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/about" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data About us</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                About
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Contact Messages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-sign-out-alt mr-1"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>