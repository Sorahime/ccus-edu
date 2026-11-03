
@extends('layouts.app')

@section('content')

<main class="lesson-page"
    data-learn-player
    data-current-slide="{{ $currentSlide }}"
    data-completed-slides="{{ $completedSlides }}"
    data-total-slides="{{ $totalSlides }}"
    data-progress-url="{{ route('learn.progress', $material['slug']) }}"
    data-index-url="{{ route('learn.index') }}"
    data-is-completed="{{ $completedSlides >= $totalSlides ? 'true' : 'false' }}"
>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- BREADCRUMB --}}
    <div class="container lesson-breadcrumb">

        <a href="{{ route('learn.index') }}">Belajar CCS</a>

        <span>›</span>

        <span>{{ $material['title'] }}</span>

    </div>


    {{-- LESSON HERO --}}
    <section class="container lesson-hero">

        <div class="lesson-hero-copy">

            <span class="section-kicker green-kicker">
                MATERI {{ sprintf('%02d', $material['number']) }}
                / {{ strtoupper($material['category']) }}
            </span>

            <h1>{{ $material['title'] }}</h1>

            <p>{{ $material['description'] }}</p>

            <div class="lesson-meta">
                <span>📖 {{ $totalSlides }} Slide</span>
                <span>⏱️ {{ $material['duration'] }}</span>
            </div>

        </div>


        <div class="lesson-hero-art">

            <div class="factory-sky-cloud cloud-a"></div>
            <div class="factory-sky-cloud cloud-b"></div>

            <div class="factory-scene-icon">
                🏭
            </div>

            <div class="factory-ground"></div>

            <div class="factory-tree tree-a">🌳</div>
            <div class="factory-tree tree-b">🌳</div>

        </div>

    </section>


    {{-- LEARNING WORKSPACE --}}
    <section class="container lesson-workspace">

        {{-- CONTENTS SIDEBAR --}}
        <aside class="lesson-sidebar">

            <div class="lesson-sidebar-heading">
                <span>📚</span>
                <h2>Daftar Isi</h2>
            </div>

            <div class="lesson-toc">

                @foreach($material['slides'] as $index => $slide)

                    <button
                        type="button"
                        class="toc-item
                            {{ $index === $currentSlide ? 'active' : '' }}
                            {{ $index < $completedSlides ? 'completed' : '' }}"
                        data-toc-index="{{ $index }}"
                        {{ $index > $completedSlides ? 'disabled' : '' }}
                    >

                        <span class="toc-icon">
                            @if($index < $completedSlides)
                                ✓
                            @else
                                ◈
                            @endif
                        </span>

                        <span class="toc-title">
                            {{ $slide['title'] }}
                        </span>

                        @if($index === $currentSlide)
                            <span class="toc-current-dot"></span>
                        @endif

                    </button>

                @endforeach

            </div>


            <div class="lesson-sidebar-footer">
                <span>YOUR PROGRESS</span>

                <strong data-progress-label>
                    {{ $percentage }}%
                </strong>

                <div class="lesson-progress-track">
                    <div
                        class="lesson-progress-fill"
                        data-progress-fill
                        style="width: {{ $percentage }}%"
                    ></div>
                </div>

                <small data-slide-count>
                    {{ $completedSlides }} dari {{ $totalSlides }} slide selesai
                </small>

            </div>

        </aside>


        {{-- SLIDE CONTENT --}}
        <div class="lesson-content-card">

            <div class="lesson-content-top">

                <div class="lesson-slide-indicator">
                    <span data-current-number>
                        {{ $currentSlide + 1 }}
                    </span>

                    / {{ $totalSlides }}
                </div>

                <div class="lesson-navigation">

                    <button
                        type="button"
                        class="lesson-nav-button"
                        data-prev-slide
                        {{ $currentSlide === 0 ? 'disabled' : '' }}
                    >
                        ← Sebelumnya
                    </button>

                    <button
                        type="button"
                        class="lesson-nav-button next"
                        data-next-slide
                    >
                        {{ $currentSlide === $totalSlides - 1 ? 'Selesaikan Materi' : 'Selanjutnya →' }}
                    </button>

                </div>

            </div>


            <div class="lesson-slides">

                @foreach($material['slides'] as $index => $slide)

                    <article
                        class="lesson-slide
                            {{ $index === $currentSlide ? 'active' : '' }}"
                        data-slide="{{ $index }}"
                        @if($index !== $currentSlide) hidden @endif
                    >

                        <span class="slide-kicker">
                            BAGIAN {{ sprintf('%02d', $index + 1) }}
                        </span>

                        <h2>{{ $slide['title'] }}</h2>

                        <p class="slide-body">
                            {{ $slide['body'] }}
                        </p>


                        <div class="slide-takeaway">

                            <div class="takeaway-icon">✦</div>

                            <div>
                                <strong>Tujuan Pembelajaran</strong>

                                <p>{{ $slide['takeaway'] }}</p>
                            </div>

                        </div>


                        <div class="slide-mascot">

                            <img
                                src="{{ asset('assets/mascot/coco-happy.png') }}"
                                alt="Coco"
                            >

                            <span>
                                {{ $index === $totalSlides - 1
                                    ? 'Hebat! Kamu hampir selesai!'
                                    : 'Yuk, lanjut belajar!' }}
                            </span>

                        </div>

                    </article>

                @endforeach

            </div>


            {{-- COMPLETION NOTICE --}}
            <div class="lesson-completion" data-completion hidden>

                <div class="completion-icon">🎉</div>

                <h2>Materi Berhasil Diselesaikan!</h2>

                <p>
                    Hebat! Kamu sudah menyelesaikan seluruh slide
                    {{ $material['title'] }}.
                </p>

                <a href="{{ route('learn.index') }}" class="completion-button">
                    Kembali ke Daftar Materi →
                </a>

            </div>


            <div class="lesson-content-footer">

                <span>
                    🌱 Pelajari setiap bagian untuk menyelesaikan materi.
                </span>

                <span data-save-status>
                    Progress tersimpan otomatis
                </span>

            </div>

        </div>

    </section>

</main>

@endsection
