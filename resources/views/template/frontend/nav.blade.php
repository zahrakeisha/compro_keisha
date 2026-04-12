<!-- Navbar Start -->
<nav class="navbar">
    @if(!empty($nav))
    <a href="/" class="navbar-logo">
        <img src="{{ asset('storage/'.$nav->logo) }}" alt="{{ $nav->company_name }}" class="navbar-logo-img">
        {{ $nav->company_name }}
    </a>
    @endif

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
                    <a href="{{ route('service.detail', $service->slug) }}">{{ $service->title }}</a>
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