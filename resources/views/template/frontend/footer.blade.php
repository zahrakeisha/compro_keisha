<!-- Footer Start -->
<footer>
    @if(!empty($footer))
    <div class="footer-brand">
        <a href="/" class="navbar-logo">{{ $footer->name }}</a>
        <p>{!! $footer->description !!}</p>
    </div>

    <div class="sosial">
        <a href="{!! $footer->instagram !!}" aria-label="Instagram" target="_blank">
            <i data-feather="instagram"></i>
        </a>
        <a href="{!! $footer->facebook !!}" aria-label="Facebook" target="_blank">
            <i data-feather="facebook"></i>

        </a>
        <a href="{!! $footer->youtube !!}" aria-label="YouTube" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58a2.78 2.78 0 0 0 1.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/>
                <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/>
            </svg>

        </a>
    </div>
    @endif

    <div class="credit">
        <p>© 2026 <a href="#">PT UJPK</a>. All rights reserved.</p>
    </div>
</footer>
<!-- Footer End -->