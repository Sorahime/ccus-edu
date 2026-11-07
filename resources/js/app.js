
// ========================================
// CCUS EDU - GLOBAL NAVIGATION
// ========================================

import './quiz.js';

document.addEventListener('DOMContentLoaded', () => {

    const root = document.documentElement;

    const themeButton = document.querySelector('[data-theme-toggle]');
    const menuButton = document.querySelector('[data-menu-toggle]');
    const navLinks = document.querySelector('[data-nav-links]');


    // ========================================
    // THEME TOGGLE
    // ========================================

    const savedTheme = localStorage.getItem('ccus-theme');
    const systemTheme = window.matchMedia('(prefers-color-scheme: dark)');
    let hasSavedTheme = savedTheme === 'dark' || savedTheme === 'light';

    function applyTheme(theme) {
        root.dataset.theme = theme;
        themeButton?.setAttribute('aria-pressed', String(theme === 'dark'));
        themeButton?.setAttribute(
            'aria-label',
            theme === 'dark' ? 'Ganti ke tema terang' : 'Ganti ke tema gelap'
        );
        document.querySelector('meta[name="theme-color"]')?.setAttribute(
            'content',
            theme === 'dark' ? '#102b25' : '#f4fbf8'
        );
    }

    applyTheme(
        hasSavedTheme
            ? savedTheme
            : systemTheme.matches ? 'dark' : 'light'
    );

    systemTheme.addEventListener('change', event => {
        if (!hasSavedTheme) {
            applyTheme(event.matches ? 'dark' : 'light');
        }
    });

    themeButton?.addEventListener('click', () => {
        const nextTheme =
            root.dataset.theme === 'dark' ? 'light' : 'dark';

        applyTheme(nextTheme);
        localStorage.setItem('ccus-theme', nextTheme);
        hasSavedTheme = true;
    });


    // ========================================
    // MOBILE MENU
    // ========================================

    menuButton?.addEventListener('click', () => {

        const isOpen = navLinks?.classList.toggle('is-open') ?? false;

        menuButton.setAttribute(
            'aria-expanded',
            String(isOpen)
        );

    });


    // ========================================
    // CLOSE MOBILE MENU
    // ========================================

    navLinks?.querySelectorAll('.nav-link').forEach(link => {

        link.addEventListener('click', () => {

            navLinks.classList.remove('is-open');

            menuButton?.setAttribute('aria-expanded', 'false');

        });

    });

});


// ========================================
// CCUS EDU - LEARNING MODULE SYSTEM
// ========================================

document.addEventListener('DOMContentLoaded', () => {

    const player = document.querySelector('[data-learn-player]');

    if (!player) return;

    const slides = [
        ...player.querySelectorAll('[data-slide]')
    ];

    const tocItems = [
        ...player.querySelectorAll('[data-toc-index]')
    ];

    const previousButton = player.querySelector('[data-prev-slide]');
    const nextButton = player.querySelector('[data-next-slide]');

    const progressFill = player.querySelector('[data-progress-fill]');
    const progressLabel = player.querySelector('[data-progress-label]');
    const slideCount = player.querySelector('[data-slide-count]');

    const currentNumber = player.querySelector('[data-current-number]');

    const completion = player.querySelector('[data-completion]');
    const saveStatus = player.querySelector('[data-save-status]');

    const totalSlides = Number(player.dataset.totalSlides);

    let completedSlides = Number(player.dataset.completedSlides);
    let currentSlide = Number(player.dataset.currentSlide);

    const progressUrl = player.dataset.progressUrl;
    const indexUrl = player.dataset.indexUrl;

    const csrfToken = document.querySelector(
        'meta[name="csrf-token"]'
    )?.content;


    // ========================================
    // SHOW SLIDE
    // ========================================

    function showSlide(index) {

        if (index < 0 || index >= totalSlides) return;

        if (index > completedSlides) return;

        currentSlide = index;

        slides.forEach((slide, i) => {

            const active = i === index;

            slide.hidden = !active;
            slide.classList.toggle('active', active);

        });

        tocItems.forEach((item, i) => {

            const active = i === index;
            const completed = i < completedSlides;

            item.classList.toggle('active', active);
            item.classList.toggle('completed', completed);

            const icon = item.querySelector('.toc-icon');

            if (icon) {
                icon.textContent = completed ? '✓' : '◈';
            }

            const dot = item.querySelector('.toc-current-dot');

            if (active && !dot) {

                const newDot = document.createElement('span');

                newDot.className = 'toc-current-dot';

                item.appendChild(newDot);

            } else if (!active && dot) {

                dot.remove();

            }

        });

        currentNumber.textContent = index + 1;

        previousButton.disabled = index === 0;

        nextButton.textContent =
            index === totalSlides - 1
                ? 'Selesaikan Materi ✓'
                : 'Selanjutnya →';

        nextButton.disabled = false;

    }


    // ========================================
    // UPDATE PROGRESS UI
    // ========================================

    function updateProgressUI() {

        const percentage = Math.round(
            (completedSlides / totalSlides) * 100
        );

        progressFill.style.width = `${percentage}%`;

        progressLabel.textContent = `${percentage}%`;

        slideCount.textContent =
            `${completedSlides} dari ${totalSlides} slide selesai`;

    }


    // ========================================
    // SAVE PROGRESS TO LARAVEL
    // ========================================

    async function saveProgress(slideIndex) {

        saveStatus.textContent = 'Menyimpan progress...';

        nextButton.disabled = true;

        try {

            const response = await fetch(progressUrl, {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },

                body: JSON.stringify({
                    slide: slideIndex
                })

            });

            const result = await response.json();

            if (!response.ok || !result.success) {

                throw new Error(
                    result.message || 'Gagal menyimpan progress.'
                );

            }

            completedSlides = result.completed_slides;

            updateProgressUI();

            saveStatus.textContent = '✓ Progress tersimpan';

            return result;

        } catch (error) {

            saveStatus.textContent = 'Gagal menyimpan progress';

            alert(error.message);

            return null;

        } finally {

            nextButton.disabled = false;

        }

    }


    // ========================================
    // NEXT SLIDE
    // ========================================

    nextButton.addEventListener('click', async () => {

        const result = await saveProgress(currentSlide);

        if (!result) return;

        // ALL SLIDES COMPLETED
        if (result.is_completed) {

            slides.forEach(slide => {
                slide.hidden = true;
            });

            completion.hidden = false;

            nextButton.hidden = true;
            previousButton.hidden = true;

            player.dataset.isCompleted = 'true';

            tocItems.forEach(item => {
                item.classList.add('completed');
                item.classList.remove('active');

                const icon = item.querySelector('.toc-icon');

                if (icon) icon.textContent = '✓';

                item.querySelector('.toc-current-dot')?.remove();
            });

            saveStatus.textContent = '🎉 Materi berhasil diselesaikan!';

            return;

        }

        showSlide(currentSlide + 1);

    });


    // ========================================
    // PREVIOUS SLIDE
    // ========================================

    previousButton.addEventListener('click', () => {

        if (currentSlide > 0) {
            showSlide(currentSlide - 1);
        }

    });


    // ========================================
    // TABLE OF CONTENTS
    // ========================================

    tocItems.forEach(item => {

        item.addEventListener('click', () => {

            const target = Number(item.dataset.tocIndex);

            // Prevent skipping unfinished slides.
            if (target > completedSlides) return;

            showSlide(target);

        });

    });


    // ========================================
    // INITIAL STATE
    // ========================================

    updateProgressUI();

    if (player.dataset.isCompleted === 'true') {

        slides.forEach(slide => {
            slide.hidden = true;
        });

        completion.hidden = false;

        nextButton.hidden = true;
        previousButton.hidden = true;

        saveStatus.textContent = '🎉 Materi sudah selesai';

    } else {

        showSlide(currentSlide);

    }

});
