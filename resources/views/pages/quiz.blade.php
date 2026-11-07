@extends('layouts.app')

@section('title', 'Uji Pemahaman — CCUS Edu')

@section('content')

<main class="quiz-page" data-quiz-app>
    <div class="container quiz-shell">

        <header class="quiz-heading">
            <div class="quiz-heading-copy">
                <span class="quiz-kicker">BELAJAR SAMBIL BERMAIN</span>
                <h1>Uji Pemahaman</h1>
                <h2>Seberapa Paham Kamu tentang CCUS?</h2>
                <p>
                    Kerjakan soal pilihan ganda dan lihat sejauh mana pemahamanmu.
                </p>
            </div>

            <img
                class="quiz-mascot"
                src="{{ asset('images/coco-studying.svg') }}"
                alt="Maskot CCUS Edu sedang belajar"
            >
        </header>

        <section class="quiz-panel quiz-setup-panel" data-quiz-setup>
            <form data-quiz-form>
                <div class="quiz-settings">
                    <div class="quiz-fields">
                        <label class="quiz-field">
                            <span>Pilih Kategori Materi</span>
                            <select name="category" data-quiz-category>
                                <option value="all">Semua Materi</option>
                                <option value="basics">Konsep Dasar CCUS</option>
                                <option value="process">Rantai Proses CCUS</option>
                            </select>
                        </label>

                        <label class="quiz-field">
                            <span>Jumlah Soal</span>
                            <select name="count" data-quiz-count>
                                <option value="5">5 Soal</option>
                                <option value="10">10 Soal</option>
                            </select>
                            <small data-quiz-count-note hidden>
                                Kategori ini memiliki 5 soal.
                            </small>
                        </label>
                    </div>

                    <fieldset class="quiz-mode">
                        <legend>Mode</legend>
                        <label class="quiz-mode-option">
                            <input type="radio" name="quiz-mode" value="practice" checked>
                            <span class="quiz-radio" aria-hidden="true"></span>
                            <span>
                                <strong>Latihan</strong>
                                <small>Tidak dinilai</small>
                            </span>
                        </label>
                        <label class="quiz-mode-option">
                            <input type="radio" name="quiz-mode" value="evaluation">
                            <span class="quiz-radio" aria-hidden="true"></span>
                            <span>
                                <strong>Evaluasi</strong>
                                <small>Dengan nilai</small>
                            </span>
                        </label>
                    </fieldset>
                </div>

                <button class="quiz-button quiz-button-primary quiz-start-button" type="submit">
                    Mulai Ujian <span aria-hidden="true">→</span>
                </button>
            </form>
        </section>

        <section class="quiz-panel quiz-question-panel" data-quiz-question hidden>
            <div class="quiz-progress-heading">
                <span class="quiz-mode-label" data-quiz-mode-label></span>
                <span data-quiz-question-count></span>
            </div>
            <div
                class="quiz-progress-track"
                role="progressbar"
                aria-label="Progress kuis"
                aria-valuemin="0"
                aria-valuemax="100"
                aria-valuenow="0"
                data-quiz-progress
            >
                <span data-quiz-progress-fill></span>
            </div>

            <h2 class="quiz-question-title" data-quiz-question-title></h2>
            <div class="quiz-options" role="group" aria-label="Pilihan jawaban" data-quiz-options></div>

            <div class="quiz-feedback" role="status" aria-live="polite" data-quiz-feedback hidden>
                <strong data-quiz-feedback-title></strong>
                <p data-quiz-feedback-copy></p>
            </div>

            <div class="quiz-question-actions">
                <button class="quiz-button quiz-button-secondary" type="button" data-quiz-previous hidden>
                    ← Sebelumnya
                </button>
                <button class="quiz-button quiz-button-primary" type="button" data-quiz-next disabled>
                    Lanjut <span aria-hidden="true">→</span>
                </button>
            </div>
        </section>

        <section class="quiz-panel quiz-results-panel" aria-labelledby="quiz-results-title" data-quiz-results hidden>
            <div class="quiz-results-main">
                <div class="quiz-score-ring" role="img" aria-label="Skor kamu" data-quiz-score-ring>
                    <span data-quiz-score>—</span>
                    <small data-quiz-score-caption>Skor kamu</small>
                </div>

                <div class="quiz-results-copy">
                    <span class="quiz-mode-label" data-quiz-result-mode></span>
                    <h2 id="quiz-results-title" data-quiz-results-title>Bagus!</h2>
                    <p data-quiz-results-copy></p>
                    <div class="quiz-result-actions">
                        <button class="quiz-button quiz-button-primary" type="button" data-quiz-review-toggle aria-expanded="false" aria-controls="quiz-review-list">
                            Lihat Pembahasan
                        </button>
                        <button class="quiz-button quiz-button-secondary" type="button" data-quiz-restart>
                            <span aria-hidden="true">↻</span> Ulangi Ujian
                        </button>
                    </div>
                </div>
            </div>

            <div class="quiz-review-summary">
                <strong class="quiz-summary-heading">
                    <span aria-hidden="true">▣</span> Ringkasan Jawaban
                </strong>
                <div class="quiz-summary-counts">
                    <span class="quiz-summary-count is-correct">
                        <span class="quiz-summary-icon" aria-hidden="true">✓</span>
                        <span><strong data-quiz-correct-count>0</strong> Jawaban Benar</span>
                    </span>
                    <span class="quiz-summary-count is-wrong">
                        <span class="quiz-summary-icon" aria-hidden="true">×</span>
                        <span><strong data-quiz-wrong-count>0</strong> Jawaban Salah</span>
                    </span>
                </div>
            </div>

            <div class="quiz-review-list" id="quiz-review-list" data-quiz-review-list hidden></div>
        </section>

    </div>
</main>

@endsection
