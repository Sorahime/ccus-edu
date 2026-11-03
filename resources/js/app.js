
document.addEventListener('DOMContentLoaded', () => {
    const root = document.documentElement;

    const themeButton = document.querySelector('[data-theme-toggle]');
    const menuButton = document.querySelector('[data-menu-toggle]');
    const navLinks = document.querySelector('[data-nav-links]');

    // THEME TOGGLE
    const savedTheme = localStorage.getItem('ccus-theme');

    if (savedTheme === 'dark' || savedTheme === 'light') {
        root.dataset.theme = savedTheme;
    }

    themeButton?.addEventListener('click', () => {
        const nextTheme =
            root.dataset.theme === 'dark' ? 'light' : 'dark';

        root.dataset.theme = nextTheme;
        localStorage.setItem('ccus-theme', nextTheme);
    });

    // MOBILE MENU
    menuButton?.addEventListener('click', () => {
        const isOpen = navLinks?.classList.toggle('is-open') ?? false;

        menuButton.setAttribute('aria-expanded', String(isOpen));
    });

    // NAVIGATION ACTIVE STATE
    const links = navLinks?.querySelectorAll('.nav-link') ?? [];

    function setActiveLink(link) {
        links.forEach(item => item.classList.remove('active'));
        link?.classList.add('active');
    }

    links.forEach(link => {
        link.addEventListener('click', () => {
            setActiveLink(link);

            navLinks?.classList.remove('is-open');
            menuButton?.setAttribute('aria-expanded', 'false');
        });
    });

    // BRAND CLICK = BACK TO HOME
    document.querySelector('.brand')?.addEventListener('click', () => {
        const homeLink = navLinks?.querySelector(
            'a[href="#beranda"]'
        );

        setActiveLink(homeLink);
    });

    // IMPORTANT:
    // Tidak menggunakan IntersectionObserver.
    // Active navigation hanya berubah saat pengguna mengklik menu.
});
