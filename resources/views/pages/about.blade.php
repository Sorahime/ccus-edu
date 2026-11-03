@extends('layouts.app')

@section('title', 'Tentang Kami — CCUS Edu')

@section('content')

<main class="about-page" id="tentang-kami">

    <section class="about-hero">

        <div class="container about-hero-inner">

            <div class="about-copy">
                <span class="about-kicker">CCUS EDU</span>
                <h1>Tentang Kami</h1>
                <h2>Mengenal CCUS Edu</h2>
                <p>
                    Platform edukasi yang hadir untuk mengenalkan teknologi
                    Carbon Capture, Utilization, and Storage kepada masyarakat
                    secara sederhana, interaktif, dan menyenangkan.
                </p>
            </div>

            <div class="about-art">
                <svg viewBox="0 0 560 310" role="img" aria-labelledby="about-art-title">
                    <title id="about-art-title">Ilustrasi pabrik CCUS yang ramah lingkungan</title>
                    <circle cx="429" cy="69" r="37" fill="#F6D66E"/>
                    <path d="M66 110c2-20 19-35 40-35 13 0 25 7 32 17 6-7 15-11 25-11 20 0 36 15 38 34H66Z" fill="#fff" opacity=".8"/>
                    <path d="M0 221c67-20 120-7 175-13 68-7 130-26 193-10 73 18 123-3 192 8v104H0V221Z" fill="#AEDB9B"/>
                    <path d="M0 254c56-18 113-10 168 1 61 12 116-5 172-10 70-6 145 14 220-2v67H0v-56Z" fill="#75B66B"/>

                    <path d="M151 135h241v101H151z" fill="#FFF9E8" stroke="#28694F" stroke-width="6" stroke-linejoin="round"/>
                    <path d="m151 162 48-31 45 31 48-31 47 31 53-32v106H151v-74Z" fill="#D9EED5" stroke="#28694F" stroke-width="6" stroke-linejoin="round"/>
                    <path d="M170 177h32v59h-32zm57 0h32v59h-32zm57 0h32v59h-32zm57 0h32v59h-32z" fill="#8CC6A1" stroke="#28694F" stroke-width="5"/>

                    <path d="M174 141V83h30v58m139 0V60h34v81" fill="#FFF9E8" stroke="#28694F" stroke-width="6" stroke-linejoin="round"/>
                    <path d="M174 101h30m-30 17h30m139-35h34m-34 20h34" stroke="#70B98A" stroke-width="10"/>
                    <path d="M344 58c0-14 22-14 22 0" fill="none" stroke="#28694F" stroke-width="6" stroke-linecap="round"/>

                    <path d="M104 237c0-22 18-40 40-40 8-18 29-27 49-20 12 4 21 15 23 27 19 2 34 17 34 36H104Z" fill="#4B9D60"/>
                    <path d="M363 237c4-22 22-39 44-39 13-21 43-25 61-8 9 8 14 20 13 32 19 5 31 20 31 38H363Z" fill="#4B9D60"/>
                    <path d="M0 255h560" stroke="#4E9A52" stroke-width="5"/>
                    <path d="M34 263c13-23 27-23 40 0m-20 0v-23m458 23c12-23 26-23 39 0m-20 0v-23" fill="none" stroke="#2B8050" stroke-width="5" stroke-linecap="round"/>
                </svg>
            </div>

        </div>

    </section>

    <section class="container about-values" aria-label="Profil CCUS Edu">

        <article class="about-card">
            <span class="about-card-icon" aria-hidden="true">
                <svg viewBox="0 0 32 32" fill="none">
                    <path d="M16 27s-11-6.2-11-14a6 6 0 0 1 11-3.2A6 6 0 0 1 27 13c0 7.8-11 14-11 14Z" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/>
                    <path d="M10 16h4l2-4 3 8 2-4h2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <h3>Visi</h3>
            <p>Meningkatkan literasi tentang teknologi CCUS di Indonesia.</p>
        </article>

        <article class="about-card">
            <span class="about-card-icon" aria-hidden="true">
                <svg viewBox="0 0 32 32" fill="none">
                    <path d="M5 8.5c4.2-1.6 7.9-.9 11 1.5 3.1-2.4 6.8-3.1 11-1.5V24c-4-1.4-7.7-.7-11 1.8-3.3-2.5-7-3.2-11-1.8V8.5Z" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/>
                    <path d="M16 10v15m-7-12 3 1m11-1-3 1" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </span>
            <h3>Misi</h3>
            <p>Menyediakan media pembelajaran yang mudah, interaktif, dan terpercaya.</p>
        </article>

        <article class="about-card">
            <span class="about-card-icon" aria-hidden="true">
                <svg viewBox="0 0 32 32" fill="none">
                    <circle cx="12" cy="11" r="4" stroke="currentColor" stroke-width="2.2"/>
                    <path d="M4.5 25v-2.2a7.5 7.5 0 0 1 15 0V25h-15Z" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/>
                    <path d="M21 7.5a4 4 0 0 1 0 7.8m2 3a6.5 6.5 0 0 1 4.5 6.2V25h-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
                </svg>
            </span>
            <h3>Tim Pengembang</h3>
            <p>Mahasiswa Universitas Pertamina.</p>
        </article>

        <article class="about-card">
            <span class="about-card-icon" aria-hidden="true">
                <svg viewBox="0 0 32 32" fill="none">
                    <rect x="4" y="7" width="24" height="18" rx="3" stroke="currentColor" stroke-width="2.2"/>
                    <path d="m6 10 10 8 10-8" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <h3>Kontak</h3>
            <p><a href="mailto:ccusedu@universitaspertamina.ac.id">ccusedu@universitaspertamina.ac.id</a></p>
        </article>

    </section>

</main>

@endsection
