document.addEventListener('DOMContentLoaded', () => {
    const app = document.querySelector('[data-quiz-app]');

    if (!app) {
        return;
    }

    const questionBank = [
        {
            category: 'basics',
            question: 'Apa kepanjangan dari CCUS?',
            options: [
                'Carbon Capture, Utilization, and Storage',
                'Climate Change Utility System',
                'Carbon Control and Usage Standard',
                'Clean Coal Usage Strategy',
            ],
            correctIndex: 0,
            explanation: 'CCUS adalah Carbon Capture, Utilization, and Storage: penangkapan, pemanfaatan, dan penyimpanan karbon.',
        },
        {
            category: 'basics',
            question: 'Apa tujuan utama teknologi penangkapan karbon?',
            options: [
                'Meningkatkan jumlah karbon di atmosfer',
                'Menangkap emisi CO₂ sebelum dilepaskan ke atmosfer',
                'Mengubah semua bahan bakar menjadi listrik',
                'Menghilangkan kebutuhan akan energi',
            ],
            correctIndex: 1,
            explanation: 'Penangkapan karbon memisahkan CO₂ dari sumber emisi agar dapat dimanfaatkan atau disimpan.',
        },
        {
            category: 'basics',
            question: 'Apa perbedaan utama CCS dan CCUS?',
            options: [
                'CCS hanya menangkap karbon dari kendaraan',
                'CCUS mencakup pemanfaatan CO₂ selain penyimpanannya',
                'CCS menggunakan energi terbarukan, CCUS tidak',
                'Keduanya tidak memiliki perbedaan',
            ],
            correctIndex: 1,
            explanation: 'CCUS mencakup pemanfaatan (utilization) CO₂ yang ditangkap, sedangkan CCS berfokus pada penangkapan dan penyimpanan.',
        },
        {
            category: 'basics',
            question: 'Dari mana CO₂ biasanya ditangkap dalam penerapan CCUS?',
            options: [
                'Hanya dari udara di dalam rumah',
                'Dari sumber emisi seperti fasilitas industri dan pembangkit',
                'Dari air minum',
                'Dari lapisan ozon',
            ],
            correctIndex: 1,
            explanation: 'CO₂ dapat ditangkap dari aliran emisi fasilitas industri dan pembangkit sebelum dilepas ke atmosfer.',
        },
        {
            category: 'basics',
            question: 'Apa contoh pemanfaatan CO₂ yang ditangkap?',
            options: [
                'Bahan baku untuk produk tertentu atau mineralisasi',
                'Mengubah CO₂ menjadi oksigen secara langsung',
                'Membuangnya ke sungai',
                'Menggunakannya sebagai pengganti air minum',
            ],
            correctIndex: 0,
            explanation: 'CO₂ dapat dimanfaatkan sebagai bahan baku produk, misalnya untuk bahan bangunan melalui proses mineralisasi.',
        },
        {
            category: 'process',
            question: 'Setelah ditangkap, bagaimana CO₂ umumnya dikirim ke lokasi pemanfaatan atau penyimpanan?',
            options: [
                'Melalui jaringan pipa atau kapal khusus',
                'Dilepaskan ke udara lalu dikumpulkan kembali',
                'Dikirim melalui jaringan air minum',
                'Diubah menjadi batu sebelum dikirim',
            ],
            correctIndex: 0,
            explanation: 'CO₂ yang telah dikondisikan dapat diangkut melalui pipa atau kapal menuju lokasi yang sesuai.',
        },
        {
            category: 'process',
            question: 'Di mana CO₂ dapat disimpan secara geologis?',
            options: [
                'Di formasi batuan bawah permukaan yang sesuai',
                'Di gua terbuka di permukaan',
                'Di sungai dan danau',
                'Di dalam lapisan tanah paling atas',
            ],
            correctIndex: 0,
            explanation: 'Penyimpanan geologis dilakukan pada formasi batuan bawah permukaan yang memiliki karakteristik dan lapisan penutup yang sesuai.',
        },
        {
            category: 'process',
            question: 'Mengapa lokasi penyimpanan CO₂ perlu dipantau?',
            options: [
                'Untuk memastikan penyimpanan tetap aman dan sesuai rencana',
                'Agar CO₂ dapat kembali ke atmosfer lebih cepat',
                'Untuk mengubah lokasi menjadi tambang',
                'Agar tidak perlu mengukur emisi',
            ],
            correctIndex: 0,
            explanation: 'Pemantauan membantu memastikan CO₂ tetap tersimpan dan mendeteksi perubahan yang perlu ditindaklanjuti.',
        },
        {
            category: 'process',
            question: 'Apa yang perlu dilakukan sebelum menentukan lokasi penyimpanan geologis?',
            options: [
                'Menilai kondisi geologi dan kelayakan lokasi',
                'Memilih lokasi hanya berdasarkan jarak terdekat',
                'Mengabaikan kondisi batuan',
                'Membuka sumur tanpa pengukuran',
            ],
            correctIndex: 0,
            explanation: 'Karakteristik geologi, kapasitas, dan integritas lapisan penutup perlu dinilai untuk menentukan kelayakan lokasi.',
        },
        {
            category: 'process',
            question: 'Apa yang terjadi pada CO₂ dalam proses mineralisasi?',
            options: [
                'CO₂ bereaksi membentuk mineral karbonat yang stabil',
                'CO₂ berubah menjadi air tanpa reaksi',
                'CO₂ menghilang tanpa jejak',
                'CO₂ berubah menjadi nitrogen',
            ],
            correctIndex: 0,
            explanation: 'Dalam mineralisasi, CO₂ bereaksi dengan mineral tertentu dan dapat membentuk mineral karbonat yang stabil.',
        },
    ];

    const setup = app.querySelector('[data-quiz-setup]');
    const form = app.querySelector('[data-quiz-form]');
    const categorySelect = app.querySelector('[data-quiz-category]');
    const countSelect = app.querySelector('[data-quiz-count]');
    const countNote = app.querySelector('[data-quiz-count-note]');
    const questionPanel = app.querySelector('[data-quiz-question]');
    const resultsPanel = app.querySelector('[data-quiz-results]');
    const questionCount = app.querySelector('[data-quiz-question-count]');
    const progress = app.querySelector('[data-quiz-progress]');
    const progressFill = app.querySelector('[data-quiz-progress-fill]');
    const questionTitle = app.querySelector('[data-quiz-question-title]');
    const optionsContainer = app.querySelector('[data-quiz-options]');
    const feedback = app.querySelector('[data-quiz-feedback]');
    const feedbackTitle = app.querySelector('[data-quiz-feedback-title]');
    const feedbackCopy = app.querySelector('[data-quiz-feedback-copy]');
    const previousButton = app.querySelector('[data-quiz-previous]');
    const nextButton = app.querySelector('[data-quiz-next]');
    const modeLabel = app.querySelector('[data-quiz-mode-label]');
    const scoreRing = app.querySelector('[data-quiz-score-ring]');
    const scoreValue = app.querySelector('[data-quiz-score]');
    const scoreCaption = app.querySelector('[data-quiz-score-caption]');
    const resultMode = app.querySelector('[data-quiz-result-mode]');
    const resultsTitle = app.querySelector('[data-quiz-results-title]');
    const resultsCopy = app.querySelector('[data-quiz-results-copy]');
    const correctCount = app.querySelector('[data-quiz-correct-count]');
    const wrongCount = app.querySelector('[data-quiz-wrong-count]');
    const reviewToggle = app.querySelector('[data-quiz-review-toggle]');
    const reviewList = app.querySelector('[data-quiz-review-list]');
    const restartButton = app.querySelector('[data-quiz-restart]');

    let quizQuestions = [];
    let answers = [];
    let currentQuestionIndex = 0;
    let quizMode = 'practice';

    function updateQuestionCountOptions() {
        const allMaterialsSelected = categorySelect.value === 'all';
        const tenQuestionOption = countSelect.querySelector('option[value="10"]');

        tenQuestionOption.disabled = !allMaterialsSelected;
        countNote.hidden = allMaterialsSelected;

        if (!allMaterialsSelected && countSelect.value === '10') {
            countSelect.value = '5';
        }
    }

    function updatePracticeFeedback(question) {
        const selectedAnswer = answers[currentQuestionIndex];

        feedback.hidden = quizMode !== 'practice' || selectedAnswer === null;

        if (feedback.hidden) {
            return;
        }

        const isCorrect = selectedAnswer === question.correctIndex;

        feedback.classList.toggle('is-correct', isCorrect);
        feedback.classList.toggle('is-wrong', !isCorrect);
        feedbackTitle.textContent = isCorrect ? 'Jawaban kamu benar!' : 'Belum tepat.';
        feedbackCopy.textContent = question.explanation;
    }

    function showQuestion() {
        const question = quizQuestions[currentQuestionIndex];

        questionCount.textContent = `Soal ${currentQuestionIndex + 1} dari ${quizQuestions.length}`;
        questionTitle.textContent = question.question;
        progressFill.style.width = `${((currentQuestionIndex + 1) / quizQuestions.length) * 100}%`;
        progress.setAttribute(
            'aria-valuenow',
            String(Math.round(((currentQuestionIndex + 1) / quizQuestions.length) * 100))
        );
        optionsContainer.replaceChildren();

        question.options.forEach((option, optionIndex) => {
            const label = document.createElement('label');
            const input = document.createElement('input');
            const content = document.createElement('span');
            const letter = document.createElement('span');
            const text = document.createElement('span');

            label.className = 'quiz-option';
            input.type = 'radio';
            input.name = `quiz-answer-${currentQuestionIndex}`;
            input.value = String(optionIndex);
            input.checked = answers[currentQuestionIndex] === optionIndex;
            content.className = 'quiz-option-content';
            letter.className = 'quiz-option-letter';
            letter.setAttribute('aria-hidden', 'true');
            letter.textContent = String.fromCharCode(65 + optionIndex);
            text.textContent = option;
            content.append(letter, text);
            label.append(input, content);
            optionsContainer.append(label);

            input.addEventListener('change', () => {
                answers[currentQuestionIndex] = optionIndex;
                nextButton.disabled = false;
                updatePracticeFeedback(question);
            });
        });

        modeLabel.textContent = quizMode === 'evaluation' ? 'Mode evaluasi' : 'Mode latihan';
        previousButton.hidden = currentQuestionIndex === 0;
        nextButton.disabled = answers[currentQuestionIndex] === null;
        nextButton.innerHTML = currentQuestionIndex === quizQuestions.length - 1
            ? 'Lihat Hasil <span aria-hidden="true">→</span>'
            : 'Lanjut <span aria-hidden="true">→</span>';

        updatePracticeFeedback(question);
    }

    function showReview() {
        reviewList.replaceChildren();

        quizQuestions.forEach((question, index) => {
            const isCorrect = answers[index] === question.correctIndex;
            const item = document.createElement('article');
            const title = document.createElement('strong');
            const answer = document.createElement('p');
            const explanation = document.createElement('p');

            item.className = `quiz-review-item ${isCorrect ? 'is-correct' : 'is-wrong'}`;
            title.textContent = `${index + 1}. ${question.question}`;
            answer.className = 'quiz-review-answer';
            answer.textContent = isCorrect
                ? `Jawaban kamu: ${question.options[answers[index]]}`
                : `Jawaban kamu: ${question.options[answers[index]]} · Jawaban benar: ${question.options[question.correctIndex]}`;
            explanation.textContent = question.explanation;
            item.append(title, answer, explanation);
            reviewList.append(item);
        });
    }

    function finishQuiz() {
        const totalCorrect = answers.reduce(
            (total, answer, index) => total + Number(answer === quizQuestions[index].correctIndex),
            0
        );
        const totalWrong = quizQuestions.length - totalCorrect;
        const score = Math.round((totalCorrect / quizQuestions.length) * 100);
        const isEvaluation = quizMode === 'evaluation';

        scoreValue.textContent = isEvaluation ? `${score}%` : `${totalCorrect}/${quizQuestions.length}`;
        scoreCaption.textContent = isEvaluation ? `dari ${quizQuestions.length} soal` : 'jawaban benar';
        scoreRing.style.setProperty('--score', `${isEvaluation ? score : 100}%`);
        scoreRing.setAttribute(
            'aria-label',
            isEvaluation ? `Skor kamu ${score}%` : `Latihan selesai, ${totalCorrect} jawaban benar`
        );
        resultMode.textContent = isEvaluation ? 'Mode evaluasi' : 'Mode latihan';
        resultsTitle.textContent = isEvaluation
            ? score >= 80 ? 'Bagus!' : 'Terus Belajar!'
            : 'Latihan Selesai!';
        resultsCopy.textContent = isEvaluation
            ? score >= 80
                ? 'Kamu sudah memahami konsep dasar CCUS dengan baik. Terus pelajari materi lainnya untuk memperdalam pemahamanmu.'
                : 'Tetap semangat! Pelajari kembali materi CCUS, lalu coba lagi untuk melihat perkembanganmu.'
            : 'Kamu sudah menyelesaikan latihan. Pelajari pembahasan untuk memahami setiap jawaban.';
        correctCount.textContent = String(totalCorrect);
        wrongCount.textContent = String(totalWrong);

        showReview();
        setup.hidden = true;
        questionPanel.hidden = true;
        resultsPanel.hidden = false;
        resultsPanel.scrollIntoView({ block: 'start' });
    }

    form.addEventListener('submit', event => {
        event.preventDefault();

        const selectedCategory = categorySelect.value;
        const availableQuestions = selectedCategory === 'all'
            ? questionBank
            : questionBank.filter(question => question.category === selectedCategory);

        quizQuestions = availableQuestions.slice(0, Number(countSelect.value));
        answers = Array(quizQuestions.length).fill(null);
        currentQuestionIndex = 0;
        quizMode = form.querySelector('input[name="quiz-mode"]:checked').value;
        reviewList.hidden = true;
        reviewToggle.setAttribute('aria-expanded', 'false');
        reviewToggle.textContent = 'Lihat Pembahasan';
        setup.hidden = true;
        resultsPanel.hidden = true;
        questionPanel.hidden = false;

        showQuestion();
    });

    categorySelect.addEventListener('change', updateQuestionCountOptions);

    previousButton.addEventListener('click', () => {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex -= 1;
            showQuestion();
        }
    });

    nextButton.addEventListener('click', () => {
        if (answers[currentQuestionIndex] === null) {
            return;
        }

        if (currentQuestionIndex === quizQuestions.length - 1) {
            finishQuiz();
            return;
        }

        currentQuestionIndex += 1;
        showQuestion();
    });

    reviewToggle.addEventListener('click', () => {
        const isExpanded = reviewToggle.getAttribute('aria-expanded') === 'true';

        reviewToggle.setAttribute('aria-expanded', String(!isExpanded));
        reviewList.hidden = isExpanded;
        reviewToggle.textContent = isExpanded ? 'Lihat Pembahasan' : 'Tutup Pembahasan';
    });

    restartButton.addEventListener('click', () => {
        form.reset();
        updateQuestionCountOptions();
        setup.hidden = false;
        questionPanel.hidden = true;
        resultsPanel.hidden = true;
        setup.scrollIntoView({ block: 'start' });
    });

    updateQuestionCountOptions();
});
