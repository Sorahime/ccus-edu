
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
                Belajar CCUS
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

            <a
                class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                href="{{ route('about') }}"
            >
                Tentang Kami
            </a>

        </div>


        {{-- THEME --}}
        <div class="nav-actions">

            <button
                class="theme-toggle"
                type="button"
                aria-label="Ganti ke tema gelap"
                aria-pressed="false"
                data-theme-toggle
            >
                <span class="theme-toggle-thumb" aria-hidden="true">
                    <svg class="theme-icon theme-icon-sun" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="4" fill="currentColor"/>
                        <path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <svg class="theme-icon theme-icon-moon" viewBox="0 0 24 24" fill="none">
                        <path d="M20.2 15.1A8.5 8.5 0 0 1 8.9 3.8 8.7 8.7 0 1 0 20.2 15.1Z" fill="currentColor"/>
                    </svg>
                </span>
            </button>

        </div>

    </nav>
</header>
