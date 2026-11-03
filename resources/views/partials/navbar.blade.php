
<header class="site-header">
    <nav class="navbar container" aria-label="Navigasi utama">

        {{-- BRAND --}}
        <a class="brand" href="{{ route('home') }}#beranda"
           aria-label="CCUS Edu">

            <span class="brand-mark">
                <svg viewBox="0 0 48 48" fill="none">
                    <path d="M24 4C14 4 6 12 6 22c0 4 1 7 3 10 2-7 8-12 15-12 5 0 9 2 12 6 2-3 3-6 3-9C39 10 32 4 24 4Z" fill="#63B96D"/>
                    <path d="M8 33c4 7 11 11 19 11 7 0 13-3 17-9-2-7-8-12-15-12-8 0-15 4-21 10Z" fill="#176B50"/>
                    <path d="M22 19c-4-7-2-13 4-16 6 2 9 7 8 13-4 0-8 1-12 3Z" fill="#238D62"/>
                </svg>
            </span>

            <span class="brand-copy">
                <strong>CCUS Edu</strong>
                <small>Explore · Learn · Discover</small>
            </span>

        </a>


        {{-- MOBILE MENU --}}
        <button
            class="mobile-menu-toggle"
            type="button"
            aria-label="Buka menu"
            aria-expanded="false"
            data-menu-toggle
        >
            <span></span>
            <span></span>
            <span></span>
        </button>


        {{-- NAVIGATION --}}
        <div class="nav-links" data-nav-links>

            <a
                class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                href="{{ route('home') }}#beranda"
            >
                Beranda
            </a>

            <a
                class="nav-link {{ request()->routeIs('learn.*') ? 'active' : '' }}"
                href="{{ route('learn.index') }}"
            >
                Belajar CCS
            </a>

            <a class="nav-link" href="{{ route('home') }}#materi">
                Materi &amp; Modul
            </a>

            <a class="nav-link" href="{{ route('home') }}#artikel">
                Artikel
            </a>

            <a class="nav-link" href="{{ route('home') }}#game">
                Game &amp; Kuis
            </a>

            <a class="nav-link" href="{{ route('home') }}#uji">
                Uji Pemahaman
            </a>

            <a class="nav-link" href="{{ route('home') }}#tentang">
                Tentang Kami
            </a>

        </div>


        {{-- THEME --}}
        <div class="nav-actions">

            <button
                class="theme-toggle"
                type="button"
                aria-label="Ganti tema"
                data-theme-toggle
            >
                <span class="sun">☼</span>
                <span class="moon">☾</span>
            </button>

        </div>

    </nav>
</header>
