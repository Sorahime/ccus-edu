
@extends('layouts.app')

@section('title', 'CCUS Edu — Explore, Learn, Discover')

@section('content')

<main id="beranda">

    {{-- HERO SECTION --}}
    <section class="hero-section">

        <div class="hero-decoration leaf leaf-left"></div>
        <div class="hero-decoration leaf leaf-right"></div>

        <div class="container hero-grid">

            <div class="hero-copy">

                <span class="eyebrow">
                    <span class="eyebrow-leaf">❧</span>
                    Platform Edukasi CCUS
                </span>

                <h1>
                    What if carbon<br>
                    could have a<br>
                    <em>second chance?</em>
                </h1>

                <p>
                    Temukan bagaimana teknologi Carbon Capture,
                    Utilization, and Storage (CCUS) menangkap,
                    memanfaatkan, dan menyimpan karbon untuk
                    masa depan yang lebih bersih.
                </p>

                <div class="hero-actions">

                    <a class="button button-primary" href="#belajar">
                        <span class="button-play">▶</span>
                        Mulai Belajar
                        <span>→</span>
                    </a>

                    <a class="button button-outline" href="#cara-kerja">
                        <span class="button-icon">▤</span>
                        Lihat Cara Kerja
                    </a>

                </div>

                <div class="hero-note">
                    <span class="note-dot"></span>
                    Belajar teknologi masa depan dengan cara yang menyenangkan.
                </div>

            </div>


            {{-- HERO ILLUSTRATION --}}
            <div class="hero-art" aria-label="Ilustrasi teknologi CCUS">

                <div class="hero-sky-cloud cloud-one"></div>
                <div class="hero-sky-cloud cloud-two"></div>
                <div class="sun-orb"></div>

                <div class="hero-mascot">
                    <img
                        src="{{ asset('build/assets/mascot/coco-happy.png') }}"
                        alt="Coco, maskot CO2 CCUS Edu"
                    >
                </div>

                {{-- FACTORY AND UNDERGROUND STORAGE --}}
                <div class="factory-scene">

                    <svg viewBox="0 0 620 390"
                         role="img"
                         aria-label="Ilustrasi pabrik dan penyimpanan karbon bawah tanah">

                        <defs>
                            <linearGradient id="ground" x1="0" y1="0" x2="0" y2="1">
                                <stop stop-color="#A7D66E"/>
                                <stop offset="1" stop-color="#75B65B"/>
                            </linearGradient>

                            <linearGradient id="soil" x1="0" y1="0" x2="0" y2="1">
                                <stop stop-color="#D99D62"/>
                                <stop offset="1" stop-color="#A86D43"/>
                            </linearGradient>
                        </defs>

                        {{-- Underground layers --}}
                        <path d="M0 188 Q80 174 145 188 T300 185 T470 188 T620 181 V390 H0Z"
                              fill="#C8E8C5"/>

                        <path d="M0 214 H620 V390 H0Z"
                              fill="url(#soil)"/>

                        <path d="M0 270 Q120 245 235 274 T470 266 T620 275 V390 H0Z"
                              fill="#B77A4B"
                              opacity=".55"/>

                        <path d="M0 330 Q110 305 220 334 T440 326 T620 332 V390 H0Z"
                              fill="#8E6042"
                              opacity=".45"/>

                        <path d="M0 188 Q100 177 190 188 T380 188 T620 184 V220 H0Z"
                              fill="url(#ground)"/>

                        <path d="M0 198 Q100 187 190 198 T380 198 T620 194"
                              fill="none"
                              stroke="#4F9A50"
                              stroke-width="5"/>


                        {{-- Factory --}}
                        <rect x="112" y="102" width="208" height="86"
                              rx="8"
                              fill="#F4F0D9"
                              stroke="#245B4A"
                              stroke-width="5"/>

                        <path d="M112 137 154 108 190 137 225 108 267 137 320 104 V188 H112Z"
                              fill="#DDE9D0"
                              stroke="#245B4A"
                              stroke-width="5"
                              stroke-linejoin="round"/>

                        <rect x="145" y="143" width="28" height="45"
                              rx="3"
                              fill="#83BCA0"
                              stroke="#245B4A"
                              stroke-width="4"/>

                        <rect x="194" y="143" width="28" height="45"
                              rx="3"
                              fill="#83BCA0"
                              stroke="#245B4A"
                              stroke-width="4"/>

                        <rect x="245" y="143" width="28" height="45"
                              rx="3"
                              fill="#83BCA0"
                              stroke="#245B4A"
                              stroke-width="4"/>

                        {{-- Chimneys --}}
                        <rect x="132" y="49" width="36" height="92"
                              rx="6"
                              fill="#F3F0D8"
                              stroke="#245B4A"
                              stroke-width="5"/>

                        <path d="M132 78 H168 M132 95 H168"
                              stroke="#64A77A"
                              stroke-width="12"/>

                        <rect x="280" y="26" width="42" height="119"
                              rx="6"
                              fill="#F5F1D9"
                              stroke="#245B4A"
                              stroke-width="5"/>

                        <path d="M280 57 H322 M280 76 H322"
                              stroke="#6EB68B"
                              stroke-width="13"/>

                        <path d="M287 25 Q301 7 315 25"
                              fill="none"
                              stroke="#245B4A"
                              stroke-width="5"/>

                        <path d="M300 8 C282 -12 306 -25 319 -12 C330 -1 315 8 300 8Z"
                              fill="#A9C9C2"
                              opacity=".8"/>


                        {{-- CO2 Storage Tank --}}
                        <rect x="370" y="100" width="112" height="88"
                              rx="22"
                              fill="#F7F2D9"
                              stroke="#245B4A"
                              stroke-width="5"/>

                        <ellipse cx="426" cy="100" rx="56" ry="16"
                                 fill="#E9E5CC"
                                 stroke="#245B4A"
                                 stroke-width="5"/>

                        <text x="426" y="151"
                              text-anchor="middle"
                              font-size="26"
                              font-weight="800"
                              fill="#174E3E">CO₂</text>

                        <path d="M322 151 H370"
                              stroke="#245B4A"
                              stroke-width="8"
                              stroke-linecap="round"/>


                        {{-- Injection pipeline --}}
                        <path d="M482 146 H530 V233"
                              stroke="#245B4A"
                              stroke-width="8"
                              fill="none"
                              stroke-linecap="round"/>

                        <path d="M530 233 V288"
                              stroke="#E8F5E8"
                              stroke-width="12"
                              stroke-linecap="round"/>

                        <path d="M530 233 V288"
                              stroke="#278F7A"
                              stroke-width="5"
                              stroke-linecap="round"/>

                        <ellipse cx="530" cy="306" rx="76" ry="17"
                                 fill="#63C9D0"
                                 opacity=".9"/>

                        <path d="M490 306 Q530 323 570 306"
                              fill="none"
                              stroke="#E1FFFF"
                              stroke-width="4"/>


                        {{-- Trees --}}
                        <g stroke="#28634B" stroke-width="5">

                            <path d="M72 188 V133 M555 188 V130"/>

                            <circle cx="72" cy="120" r="25" fill="#82C86A"/>
                            <circle cx="55" cy="132" r="18" fill="#A0D875"/>
                            <circle cx="88" cy="137" r="19" fill="#65B86B"/>

                            <circle cx="555" cy="115" r="28" fill="#7EC66C"/>
                            <circle cx="536" cy="132" r="19" fill="#A3D97C"/>
                            <circle cx="578" cy="137" r="19" fill="#5FAF63"/>

                        </g>

                        <g fill="#E7B77E" opacity=".8">
                            <circle cx="60" cy="246" r="4"/>
                            <circle cx="220" cy="300" r="5"/>
                            <circle cx="390" cy="350" r="4"/>
                            <circle cx="580" cy="260" r="5"/>
                        </g>

                    </svg>

                </div>


                {{-- FLOATING PROCESS CARDS --}}
                <div class="process-float capture-float">
                    <span class="process-icon">◎</span>
                    <span>
                        <strong>Capture</strong>
                        <small>Menangkap CO₂ dari sumber emisi</small>
                    </span>
                </div>

                <div class="process-float storage-float">
                    <span class="process-icon">▤</span>
                    <span>
                        <strong>Storage</strong>
                        <small>Menyimpan CO₂ secara aman</small>
                    </span>
                </div>

                <div class="process-float utilization-float">
                    <span class="process-icon">♧</span>
                    <span>
                        <strong>Utilization</strong>
                        <small>Mengolah CO₂ menjadi produk bernilai</small>
                    </span>
                </div>

            </div>

        </div>
    </section>


    {{-- STATISTICS --}}
    <section class="container stats-strip" aria-label="Ringkasan platform">

        <div class="stat-item">
            <span class="stat-icon">♧</span>
            <span>
                <strong>3</strong>
                <small>Tahapan Utama<br>(Capture · Utilization · Storage)</small>
            </span>
        </div>

        <div class="stat-item">
            <span class="stat-icon">▤</span>
            <span>
                <strong>10+</strong>
                <small>Materi Edukasi<br>Interaktif</small>
            </span>
        </div>

        <div class="stat-item">
            <span class="stat-icon">♧</span>
            <span>
                <strong>Game &amp; Kuis</strong>
                <small>Belajar sambil<br>bermain</small>
            </span>
        </div>

        <div class="stat-item">
            <span class="stat-icon">♙</span>
            <span>
                <strong>Untuk Semua</strong>
                <small>Pelajar, mahasiswa,<br>dan masyarakat umum</small>
            </span>
        </div>

    </section>


    {{-- WHY CCUS MATTERS --}}
    <section class="container impact-banner" id="belajar">

        <div class="earth-art" aria-hidden="true">
            <svg viewBox="0 0 300 220">

                <circle cx="145" cy="116" r="96" fill="#55B8C2"/>

                <path d="M67 58 Q90 25 126 38 L146 60 126 78 100 73 92 96 66 91 53 75Z"
                      fill="#8ACB70"/>

                <path d="M157 34 Q204 26 225 62 L208 87 180 83 169 105 143 90 133 60Z"
                      fill="#8ACB70"/>

                <path d="M102 133 130 119 155 137 147 169 123 190 98 169Z"
                      fill="#8ACB70"/>

                <path d="M190 132 222 119 237 145 213 177 186 165Z"
                      fill="#8ACB70"/>

                <path d="M38 105 Q76 85 99 104 T151 105"
                      fill="none"
                      stroke="#DFF7F2"
                      stroke-width="7"
                      stroke-linecap="round"
                      opacity=".7"/>

                <path d="M164 190 Q205 177 245 194"
                      fill="none"
                      stroke="#DFF7F2"
                      stroke-width="6"
                      stroke-linecap="round"
                      opacity=".6"/>

                <path d="M43 47 Q63 23 83 43 Q102 22 120 47"
                      fill="#F6FFF8"/>

            </svg>
        </div>

        <div class="impact-copy">
            <span class="section-kicker">MENGAPA CCUS PENTING?</span>

            <h2>
                Mengurangi Emisi,<br>
                Menjaga Bumi Tetap Bernapas.
            </h2>

            <p>
                CCUS membantu menekan emisi karbon dioksida (CO₂)
                dari aktivitas industri, memanfaatkannya kembali,
                dan menyimpannya dengan aman di dalam bumi.
            </p>
        </div>

        <a class="button button-light" href="#cara-kerja">
            Pelajari Selengkapnya <span>→</span>
        </a>

    </section>


    {{-- GAME AND PROCESS --}}
    <section class="container feature-grid" id="cara-kerja">

        <article class="interactive-card" id="game">

            <div class="interactive-copy">

                <h2>Belajar Lebih Seru dengan Game &amp; Kuis!</h2>

                <p>
                    Mainkan game edukasi CO₂ Journey dan uji
                    pengetahuanmu lewat berbagai kuis interaktif
                    seputar CCUS.
                </p>

                <a class="button button-primary button-small" href="#uji">
                    Main Sekarang <span>→</span>
                </a>

            </div>

            <a class="game-preview" href="#uji" aria-label="Lihat game CO2 Journey">

                <div class="game-preview-title">
                    CO₂ Journey:<br>
                    CCUS Runner
                </div>

                <div class="game-sky"></div>

                <img
                    src="{{ asset('assets/mascot/coco-happy.svg') }}"
                    alt=""
                    class="game-coco"
                >

                <div class="game-ground"></div>

                <span class="play-button">▶</span>

            </a>

        </article>


        {{-- THREE CCUS STEPS --}} 
        <article class="steps-card">

            <div class="steps-heading">

                <div class="steps-heading-icon">🌿</div>

                <div>
                    <span class="steps-subtitle">THE CCUS PROCESS</span>
                    <h2>Tiga Langkah Menuju Udara Lebih Bersih</h2>
                    <p>Kenali perjalanan CO₂ melalui teknologi CCUS.</p>
                </div>

            </div>


            <div class="steps-flow">

                {{-- STEP 1: CAPTURE --}}
                <div class="step">

                    <div class="step-visual capture-visual">

                        <svg viewBox="0 0 150 115" fill="none">

                            <path d="M24 92H126"
                                stroke="#4B896A"
                                stroke-width="5"
                                stroke-linecap="round"/>

                            <rect x="31" y="36" width="87" height="56"
                                rx="5"
                                fill="#E5F1DC"
                                stroke="#236A4F"
                                stroke-width="4"/>

                            <path d="M31 52H118"
                                stroke="#236A4F"
                                stroke-width="4"/>

                            <path d="M42 60V83M57 60V83M72 60V83M87 60V83M102 60V83"
                                stroke="#72AC84"
                                stroke-width="5"
                                stroke-linecap="round"/>

                            <path d="M49 35V15H72V35"
                                stroke="#236A4F"
                                stroke-width="4"
                                stroke-linejoin="round"/>

                            <path d="M60 15V7"
                                stroke="#236A4F"
                                stroke-width="4"
                                stroke-linecap="round"/>

                            <path d="M60 4C43-4 48-18 59-18C70-18 76-5 60 4Z"
                                fill="#A7C9D0"
                                opacity=".8"/>

                            <path d="M82 30C71 17 85 12 82 2"
                                stroke="#78A9A0"
                                stroke-width="4"
                                stroke-linecap="round"/>

                            <path d="M97 30C87 18 101 12 98 4"
                                stroke="#78A9A0"
                                stroke-width="4"
                                stroke-linecap="round"/>

                            <circle cx="24" cy="22" r="10"
                                    fill="#DDF2E3"/>

                            <text x="24" y="26"
                                text-anchor="middle"
                                font-size="11"
                                font-weight="800"
                                fill="#247B55">CO₂</text>

                            <path d="M34 23H44"
                                stroke="#27865B"
                                stroke-width="3"
                                stroke-linecap="round"/>

                            <path d="M40 19L45 23L40 27"
                                stroke="#27865B"
                                stroke-width="3"
                                stroke-linecap="round"
                                stroke-linejoin="round"/>

                        </svg>

                    </div>

                    <div class="step-label">
                        <span class="step-number">01</span>
                        <strong>Capture</strong>
                    </div>

                    <p>
                        Menangkap dan memisahkan CO₂
                        dari sumber emisi industri.
                    </p>

                </div>


                <div class="step-connector">
                    <span>→</span>
                </div>


                {{-- STEP 2: UTILIZATION --}}
                <div class="step">

                    <div class="step-visual utilization-visual">

                        <svg viewBox="0 0 150 115" fill="none">

                            <path d="M34 89H116"
                                stroke="#4B896A"
                                stroke-width="5"
                                stroke-linecap="round"/>

                            <path d="M52 36H98L91 83H59L52 36Z"
                                fill="#D9F1E3"
                                stroke="#267B5A"
                                stroke-width="4"
                                stroke-linejoin="round"/>

                            <path d="M59 66H91L88 82H62L59 66Z"
                                fill="#72CDA2"/>

                            <path d="M52 36H98"
                                stroke="#267B5A"
                                stroke-width="6"
                                stroke-linecap="round"/>

                            <path d="M66 25C60 13 68 3 79 4C91 5 96 16 89 26"
                                stroke="#4A9C74"
                                stroke-width="5"
                                stroke-linecap="round"/>

                            <path d="M79 26V35"
                                stroke="#267B5A"
                                stroke-width="4"/>

                            <circle cx="80" cy="56" r="9"
                                    fill="#F2C65D"/>

                            <path d="M75 56L79 60L86 51"
                                stroke="#fff"
                                stroke-width="3"
                                stroke-linecap="round"
                                stroke-linejoin="round"/>

                            <path d="M111 21L116 11M121 31L132 28"
                                stroke="#E5B74A"
                                stroke-width="4"
                                stroke-linecap="round"/>

                            <path d="M31 55C20 48 19 38 26 32"
                                stroke="#73BCA0"
                                stroke-width="4"
                                stroke-linecap="round"/>

                            <circle cx="23" cy="24" r="8"
                                    fill="#C7EAD4"/>

                        </svg>

                    </div>

                    <div class="step-label">
                        <span class="step-number">02</span>
                        <strong>Utilization</strong>
                    </div>

                    <p>
                        Memanfaatkan CO₂ sebagai bahan
                        untuk menghasilkan produk bernilai.
                    </p>

                </div>


                <div class="step-connector">
                    <span>→</span>
                </div>


                {{-- STEP 3: STORAGE --}}
                <div class="step">

                    <div class="step-visual storage-visual">

                        <svg viewBox="0 0 150 115" fill="none">

                            {{-- Surface --}}
                            <path d="M12 45H138"
                                stroke="#5E9D55"
                                stroke-width="7"
                                stroke-linecap="round"/>

                            <path d="M12 50H138V106H12Z"
                                fill="#C98F5B"/>

                            <path d="M12 70H138"
                                stroke="#E3B27C"
                                stroke-width="3"
                                opacity=".8"/>

                            <path d="M12 89H138"
                                stroke="#9E6845"
                                stroke-width="4"
                                opacity=".8"/>

                            {{-- Storage caprock --}}
                            <path d="M12 50H138"
                                stroke="#78B45B"
                                stroke-width="9"/>

                            {{-- Injection well --}}
                            <rect x="70" y="10" width="10" height="68"
                                fill="#E9F4E8"
                                stroke="#22684E"
                                stroke-width="4"/>

                            <path d="M75 78V91"
                                stroke="#F1F9EF"
                                stroke-width="6"
                                stroke-linecap="round"/>

                            {{-- CO2 storage reservoir --}}
                            <path d="M35 97C49 82 102 82 117 97"
                                stroke="#57BFC0"
                                stroke-width="8"
                                stroke-linecap="round"/>

                            <path d="M43 98C57 89 96 89 109 98"
                                stroke="#A5ECE2"
                                stroke-width="4"
                                stroke-linecap="round"/>

                            <circle cx="55" cy="94" r="4" fill="#E6FFFF"/>
                            <circle cx="97" cy="94" r="4" fill="#E6FFFF"/>

                            {{-- Trees --}}
                            <path d="M27 43V26"
                                stroke="#6D8F51"
                                stroke-width="4"
                                stroke-linecap="round"/>

                            <circle cx="27" cy="22" r="10"
                                    fill="#7CBF69"/>

                            <path d="M122 43V26"
                                stroke="#6D8F51"
                                stroke-width="4"
                                stroke-linecap="round"/>

                            <circle cx="122" cy="22" r="10"
                                    fill="#7CBF69"/>

                        </svg>

                    </div>

                    <div class="step-label">
                        <span class="step-number">03</span>
                        <strong>Storage</strong>
                    </div>

                    <p>
                        Menyimpan CO₂ di formasi geologi
                        bawah tanah yang sesuai.
                    </p>

                </div>

            </div>

        </article>


    </section>


    {{-- LEARNING PREVIEW --}}
    <section class="container learning-teaser" id="materi">

        <div class="section-heading">

            <div>
                <span class="section-kicker green-kicker">MULAI DARI SINI</span>

                <h2>Jelajahi dunia CCUS</h2>

                <p>
                    Kenali konsepnya, pahami prosesnya,
                    lalu uji pengetahuanmu.
                </p>
            </div>

            <a href="#belajar" class="section-action section-action-secondary">
                <span>Lihat semua materi</span>
                <span class="action-icon">→</span>
            </a>

        </div>


        <div class="learning-cards">

            <a class="learning-card" href="#belajar">

                <span class="learning-card-icon icon-book">▤</span>

                <span class="card-number">01 / DASAR</span>

                <h3>Mengenal CCS &amp; CCUS</h3>

                <p>
                    Mulai dari pengertian, perbedaan,
                    dan alasan teknologi ini dikembangkan.
                </p>

                <span class="card-link">Mulai belajar →</span>

            </a>


            <a class="learning-card" href="#cara-kerja">

                <span class="learning-card-icon icon-leaf">♧</span>

                <span class="card-number">02 / PROSES</span>

                <h3>Bagaimana CCUS Bekerja?</h3>

                <p>
                    Ikuti perjalanan CO₂ dari proses
                    penangkapan hingga penyimpanan.
                </p>

                <span class="card-link">Pelajari proses →</span>

            </a>


            <a class="learning-card" href="#uji">

                <span class="learning-card-icon icon-quiz">✓</span>

                <span class="card-number">03 / LATIHAN</span>

                <h3>Uji Pemahamanmu</h3>

                <p>
                    Periksa pemahamanmu melalui pertanyaan
                    singkat seputar CCUS.
                </p>

                <span class="card-link">Coba kuis →</span>

            </a>

        </div>

    </section>

    
    {{-- ARTICLES & INSIGHT --}}
    <section class="container articles-section" id="artikel">

        <div class="section-heading">

            <div>
                <span class="section-kicker green-kicker">
                    EXPLORE & DISCOVER
                </span>

                <h2>Artikel & Insight</h2>

                <p>
                    Temukan informasi, wawasan, dan perkembangan
                    teknologi CCUS dari berbagai sudut pandang.
                </p>
            </div>

            <a href="#artikel" class="section-action section-action-primary">
                <span>Jelajahi artikel</span>
                <span class="action-icon">→</span>
            </a>

        </div>


        <div class="articles-grid">

            {{-- FEATURED ARTICLE --}}
            <article class="article-card article-featured">

                <div class="article-image article-image-earth">
                    <span class="article-category">CCUS BASICS</span>

                    <div class="article-earth">
                        🌍
                    </div>

                    <span class="article-decoration">✦</span>
                </div>

                <div class="article-content">

                    <div class="article-meta">
                        <span>Dasar CCUS</span>
                        <span>•</span>
                        <span>5 menit membaca</span>
                    </div>

                    <h3>
                        Mengenal CCUS: Teknologi untuk Masa Depan
                        yang Lebih Bersih
                    </h3>

                    <p>
                        Memahami bagaimana teknologi penangkapan,
                        pemanfaatan, dan penyimpanan karbon bekerja
                        dalam upaya mengurangi emisi.
                    </p>

                    <a href="#belajar" class="article-link">
                        Baca selengkapnya →
                    </a>

                </div>

            </article>


            {{-- ARTICLE TWO --}}
            <article class="article-card">

                <div class="article-image article-image-industry">
                    <span class="article-category">TECHNOLOGY</span>

                    <div class="article-visual-icon">🏭</div>

                </div>

                <div class="article-content">

                    <div class="article-meta">
                        <span>Teknologi</span>
                        <span>•</span>
                        <span>4 menit membaca</span>
                    </div>

                    <h3>
                        Bagaimana Karbon Ditangkap dari Aktivitas Industri?
                    </h3>

                    <p>
                        Mengenal proses capture dan bagaimana
                        CO₂ dipisahkan dari gas buang industri.
                    </p>

                    <a href="#cara-kerja" class="article-link">
                        Baca selengkapnya →
                    </a>

                </div>

            </article>


            {{-- ARTICLE THREE --}}
            <article class="article-card">

                <div class="article-image article-image-storage">
                    <span class="article-category">ENVIRONMENT</span>

                    <div class="article-visual-icon">🌱</div>

                </div>

                <div class="article-content">

                    <div class="article-meta">
                        <span>Lingkungan</span>
                        <span>•</span>
                        <span>6 menit membaca</span>
                    </div>

                    <h3>
                        Ke Mana CO₂ Pergi Setelah Berhasil Ditangkap?
                    </h3>

                    <p>
                        Mengenal perjalanan karbon setelah ditangkap,
                        mulai dari pemanfaatan hingga penyimpanan.
                    </p>

                    <a href="#cara-kerja" class="article-link">
                        Baca selengkapnya →
                    </a>

                </div>

            </article>

        </div>

    </section>


</main>


{{-- FOOTER --}}
<footer class="site-footer" id="tentang">

    <div class="footer-hills" aria-hidden="true"></div>

    <div class="container footer-content">

        <div class="footer-brand">

            <a class="brand brand-light" href="#beranda">

                <span class="brand-mark">
                    <svg viewBox="0 0 48 48" fill="none">
                        <path d="M24 4C14 4 6 12 6 22c0 4 1 7 3 10 2-7 8-12 15-12 5 0 9 2 12 6 2-3 3-6 3-9C39 10 32 4 24 4Z"
                              fill="#A9D875"/>

                        <path d="M8 33c4 7 11 11 19 11 7 0 13-3 17-9-2-7-8-12-15-12-8 0-15 4-21 10Z"
                              fill="#F1F8E8"/>
                    </svg>
                </span>

                <span class="brand-copy">
                    <strong>CCUS Edu</strong>
                    <small>Explore · Learn · Discover</small>
                </span>

            </a>

            <p>
                Platform edukasi untuk mengenal teknologi
                Carbon Capture, Utilization, and Storage (CCUS)
                secara mudah, interaktif, dan menyenangkan.
            </p>

        </div>


        <div class="footer-column">
            <strong>Jelajahi</strong>
            <a href="#belajar">Belajar CCS</a>
            <a href="#materi">Materi &amp; Modul</a>
            <a href="#game">Game &amp; Kuis</a>
        </div>


        <div class="footer-column">
            <strong>Lainnya</strong>
            <a href="#uji">Uji Pemahaman</a>
            <a href="#tentang">Tentang Program</a>
            <a href="mailto:ccusedu@universitaspertamina.ac.id">
                Kontak &amp; Aspirasi
            </a>
        </div>


        <div class="footer-column social-column">
            <strong>Ikuti Kami</strong>

            <div class="social-links">
                <a href="#" aria-label="Instagram">◎</a>
                <a href="#" aria-label="YouTube">▶</a>
                <a href="#" aria-label="LinkedIn">in</a>
            </div>
        </div>

    </div>


    <div class="container footer-bottom">
        <span>© {{ date('Y') }} CCUS Edu. All rights reserved.</span>
        <span>Made for curious minds 🌱</span>
    </div>

</footer>

@endsection
