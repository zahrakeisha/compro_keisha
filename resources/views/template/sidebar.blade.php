 <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('img/ujpk.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Usaha Jaya Prima Karya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"  alt="User Image">
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
            <a href="/dashboard" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link" target="_blank">
              <i class="fas fa-external-link-alt"></i>
              <p>
                See Website
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('user*','service*','client*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('user*','service*','client*') ? 'active' : '' }}">
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
                <a href="/service" class="nav-link {{ request()->is('service*') ? 'active' : '' }}">
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
                <a href="/client" class="nav-link {{ request()->is('client*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Clients</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->is('sliders*','visions*','marketing*','blog*','contactinfo*','about*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('sliders*','visions*','marketing*','blog*','contactinfo*','about*') ? 'active' : '' }}">
              <i class="fas fa-globe"></i>
              <p>
                Website Content
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/sliders" class="nav-link {{ request()->is('sliders*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/visions" class="nav-link {{ request()->is('visions*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Visions Missions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/contactinfo" class="nav-link {{ request()->is('contactinfo*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Contact Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/blog" class="nav-link {{ request()->is('blog*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Blogs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/about" class="nav-link {{ request()->is('about*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data About us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/marketing" class="nav-link {{ request()->is('marketing*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Marketings</p>
                </a>
                </ul>
              </li>
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
            <a href="/contact" class="nav-link {{ request()->is('contact*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Contact Messages
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>