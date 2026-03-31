 <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">Usaha Jaya Prima Karya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Search -->
      <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search"
                placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
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
              <i class="nav-icon fas fa-external-link-alt"></i>
              <p>
                See Website
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('user*','service*','client*','visions*' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('user*','service*','client*','visions*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/user" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                  <i class="far fa-user nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/service" class="nav-link {{ request()->is('service*') ? 'active' : '' }}">
                  <i class="fas fa-briefcase nav-icon"></i>
                  <p>Data Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/visions" class="nav-link {{ request()->is('visions*') ? 'active' : '' }}">
                  <i class="fas fa-bullseye nav-icon"></i>
                  <p>Data Visions Missions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/client" class="nav-link {{ request()->is('client*') ? 'active' : '' }}">
                  <i class="far fa-handshake nav-icon"></i>
                  <p>Data Clients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/visitor" class="nav-link {{ request()->is('client*') ? 'active' : '' }}">
                  <i class="far fa-eye nav-icon"></i>
                  <p>Data Visitor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->is('sliders*','marketing*','blog*','contactinfo*','about*', 'nav*', 'footer*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('sliders*','marketing*','blog*','contactinfo*','about*', 'nav*', 'footer*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Website Content
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/sliders" class="nav-link {{ request()->is('sliders*') ? 'active' : '' }}">
                  <i class="fas fa-film nav-icon"></i>
                  <p>Data Slider</p>
                </a>
              </li>
        
              <li class="nav-item">
                <a href="/contactinfo" class="nav-link {{ request()->is('contactinfo*') ? 'active' : '' }}">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Data Contact Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/blog" class="nav-link {{ request()->is('blog*') ? 'active' : '' }}">
                  <i class="fas fa-newspaper nav-icon"></i>
                  <p>Data Blogs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/about" class="nav-link {{ request()->is('about*') ? 'active' : '' }}">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Data About us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/marketing" class="nav-link {{ request()->is('marketing*') ? 'active' : '' }}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Data Marketings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/nav" class="nav-link {{ request()->is('nav*') ? 'active' : '' }}">
                  <i class="fas fa-bars nav-icon"></i>
                  <p>Data Navbar Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/footer" class="nav-link {{ request()->is('footer*') ? 'active' : '' }}">
                  <i class="fas fa-info-circle nav-icon"></i>
                  <p>Data Footer Profile</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/profile" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}"">
              <i class="nav-icon fas fa-user"></i>
              <p>
                About
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/contact" class="nav-link {{ request()->is(['contact', 'contact/*']) ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
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