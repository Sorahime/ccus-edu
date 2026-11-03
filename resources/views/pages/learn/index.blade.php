
@extends('layouts.app')

@section('content')

<main class="learn-page">

    {{-- HERO --}}
    <section class="learn-hero">

        <div class="container learn-hero-inner">

            <div class="learn-hero-copy">

                <span class="section-kicker green-kicker">
                    BELAJAR CCS
                </span>

                <h1>
                    Pahami CCUS
                    <br>
                    Langkah demi Langkah
                </h1>

                <p>
                    Pelajari konsep, proses, teknologi, dan penerapan
                    CCUS melalui materi yang tersusun sistematis
                    dan interaktif.
                </p>

                <div class="learn-hero-meta">
                    <span>📚 6 Materi</span>
                    <span>⏱️ Belajar sesuai ritmemu</span>
                </div>

            </div>

            <div class="learn-hero-mascot">

                <div class="learn-decoration decoration-one">✦</div>
                <div class="learn-decoration decoration-two">✦</div>

                <div class="learn-hero-mascot">

                    <img
                        src="{{ asset('build/assets/mascot/coco-studying.png') }}"
                        alt="Coco sedang belajar CCUS"
                    >

                </div>

                <div class="mascot-caption">
                    <span>👋</span>
                    Yuk, belajar bersama Coco!
                </div>

            </div>

        </div>

    </section>


    {{-- MAIN CONTENT --}}
    <section class="container learn-content">

        {{-- PROGRESS SUMMARY --}}
        <div class="learning-summary">

            <div class="summary-heading">
                <div>
                    <span class="section-kicker">YOUR LEARNING JOURNEY</span>
                    <h2>Perjalanan Belajarmu</h2>
                </div>

                <div class="summary-percentage">
                    {{ $overallProgress }}%
                </div>
            </div>

            <div class="summary-progress-track">
                <div
                    class="summary-progress-fill"
                    style="width: {{ $overallProgress }}%"
                ></div>
            </div>

            <div class="summary-footer">
                <span>{{ $completedTotal }} dari {{ $totalSlides }} slide selesai</span>
                <span>
                    {{ collect($materials)->where('is_completed', true)->count() }}
                    dari 6 materi selesai
                </span>
            </div>

        </div>


        {{-- LOCKED MESSAGE --}}
        @if(session('locked_message'))
            <div class="learn-notice">
                <span>🔒</span>
                {{ session('locked_message') }}
            </div>
        @endif


        {{-- MATERIAL LAYOUT --}}
        <div class="learn-layout">

            {{-- SIDEBAR --}}
            <aside class="learn-sidebar">

                <h3>Daftar Materi</h3>

                <a href="#semua-materi" class="sidebar-link active">
                    <span>⌂</span>
                    Semua Materi
                </a>

                @foreach($materials as $material)

                    <a
                        href="#material-{{ $material['number'] }}"
                        class="sidebar-link"
                    >
                        <span>
                            {{ $material['is_completed'] ? '✓' : ($material['is_unlocked'] ? '◉' : '🔒') }}
                        </span>

                        {{ $material['short_title'] }}
                    </a>

                @endforeach

            </aside>


            {{-- MATERIAL GRID --}}
            <div class="learn-main" id="semua-materi">

                <div class="material-heading">

                    <div>
                        <span class="section-kicker green-kicker">
                            LEARNING MODULES
                        </span>

                        <h2>Mulai Perjalananmu</h2>

                        <p>
                            Selesaikan setiap materi untuk membuka
                            pembelajaran berikutnya.
                        </p>
                    </div>

                    <span class="material-count">
                        06 MODULES
                    </span>

                </div>


                <div class="material-grid">

                    @foreach($materials as $material)

                        <article
                            id="material-{{ $material['number'] }}"
                            class="material-card
                                {{ !$material['is_unlocked'] ? 'is-locked' : '' }}
                                {{ $material['is_completed'] ? 'is-completed' : '' }}"
                        >

                            <div class="material-card-top">

                                <div class="material-icon">
                                    {{ $material['icon'] }}
                                </div>

                                @if($material['is_completed'])
                                    <span class="material-status status-complete">
                                        ✓ Selesai
                                    </span>

                                @elseif(!$material['is_unlocked'])
                                    <span class="material-status status-locked">
                                        🔒 Terkunci
                                    </span>

                                @else
                                    <span class="material-status status-open">
                                        ● Tersedia
                                    </span>
                                @endif

                            </div>


                            <span class="material-category">
                                {{ $material['category'] }}
                            </span>


                            <h3>
                                {{ $material['number'] }}.
                                {{ $material['title'] }}
                            </h3>


                            <p class="material-description">
                                {{ $material['description'] }}
                            </p>


                            <div class="material-progress-area">

                                <div class="material-progress-info">
                                    <span>
                                        {{ $material['completed_slides'] }}/{{ $material['total_slides'] }}
                                        Slide
                                    </span>

                                    <strong>
                                        {{ $material['percentage'] }}%
                                    </strong>
                                </div>

                                <div class="material-progress-track">
                                    <div
                                        class="material-progress-fill"
                                        style="width: {{ $material['percentage'] }}%"
                                    ></div>
                                </div>

                            </div>


                            @if($material['is_unlocked'])

                                <a
                                    href="{{ route('learn.show', $material['slug']) }}"
                                    class="material-button"
                                >
                                    @if($material['is_completed'])
                                        Pelajari Kembali
                                    @elseif($material['percentage'] > 0)
                                        Lanjutkan Belajar
                                    @else
                                        Mulai Belajar
                                    @endif

                                    <span>→</span>
                                </a>

                            @else

                                <div class="material-button disabled">
                                    Selesaikan materi sebelumnya
                                    <span>🔒</span>
                                </div>

                            @endif

                        </article>

                    @endforeach

                </div>

            </div>

        </div>

    </section>

</main>

@endsection
