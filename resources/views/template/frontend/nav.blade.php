<!-- Navbar Start -->
<nav class="navbar">
    <a href="#" class="navbar-logo">PT Usaha Jaya Prima <span> Karya </span> </a>

    <div class="navbar-nav">
    <a href="/">Home</a>
    <a href="/aboutme">About Me</a>
    <a href="/visi_misi">Visi Misi</a>

    <!-- SERVICE DROPDOWN -->
    <div class="nav-item service">
    <a href="#" class="service-link">Service ▼</a>
    <ul class="drop-down">
        @foreach($services as $service)
        <li>
            <a href="">{{ $service->title }}</a>
        </li>
        @endforeach
    </ul>
    </div>
    <a href="/blogger">Blogs</a>
    <a href="/contactsfront">Contact</a>
</div>


    <div class="navbar-extra">
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
</nav>
<!-- Navbar End -->