<!-- Navbar Start -->
<nav class="navbar">
    <a href="/" class="navbar-logo">PT Usaha Jaya Prima <span>Karya</span></a>

    <div class="navbar-nav">
        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
        <a href="/aboutme" class="{{ request()->is('aboutme') ? 'active' : '' }}">About Us</a>
        <a href="/visi_misi" class="{{ request()->is('visi_misi') ? 'active' : '' }}">Visi &amp; Misi</a>

        <!-- Service Dropdown -->
        <div class="nav-item service">
            <a href="#" class="service-link">Our Service ▾</a>
            <ul class="drop-down">
                @foreach($services as $service)
                <li>
                    <a href="{{ route('service.detail', $service->service_id) }}">{{ $service->title }}</a>
                </li>
                @endforeach
            </ul>
        </div>

        <a href="/blogger" class="{{ request()->is('blogger*') ? 'active' : '' }}">Blogs</a>
        <a href="/contactsfront" class="{{ request()->is('contactsfront') ? 'active' : '' }}">Contact us</a>
    </div>

    <div class="navbar-extra">
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
</nav>
<!-- Navbar End -->