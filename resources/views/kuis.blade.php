<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis {{ $mapel->nama_matapelajaran }} | EduVibe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
        .navbar { background: linear-gradient(90deg, #a5c9ca, #e7f6f2); }
        .navbar-brand { font-weight: bold; color: #1b4965 !important; }
        .card { border: none; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); padding: 30px; }
        h3 { color: #1b4965; font-weight: bold; }
        .btn-primary { background-color: #62b6cb; border: none; }
        .btn-primary:hover { background-color: #439a86; }
        footer { background-color: #e7f6f2; padding: 20px; margin-top: 60px; }
        .timer { font-weight: bold; color: #1b4965; }
        .progress { height: 20px; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('siswa.home') }}">EduVibe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('siswa.home') }}" class="nav-link text-dark fw-semibold">Home</a></li>
                    <li class="nav-item"><a href="/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- KUIS -->
    <div class="container mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">← Kembali</a>

        <div class="card">
            <h3 class="text-center mb-4">Kuis: {{ $mapel->nama_matapelajaran }}</h3>
            <div class="text-end mb-3 timer" id="timer">Waktu: 60 detik</div>
            <div class="progress mb-4">
                <div class="progress-bar" id="progressBar" style="width: 0%"></div>
            </div>

            <form id="quizForm"></form>

            <div class="text-center mt-4" id="quizButtons">
                <button type="button" class="btn btn-primary px-4 py-2" id="nextBtn">Selanjutnya</button>
            </div>

            <div class="text-center mt-4 d-none" id="result">
                <h4>Skor Anda: <span id="score"></span>/3</h4>
                <button class="btn btn-primary mt-3" id="retryBtn">Ulangi Kuis</button>
            </div>
        </div>
    </div>

    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
    </footer>

    <script>
        const questions = [
            { q: "Berapakah hasil dari 5 + 7?", options: ["10", "12", "14"], answer: 1 },
            { q: "Jika x = 3, maka 2x + 5 = ?", options: ["9", "11", "10"], answer: 1 },
            { q: "Berapakah hasil dari 15 ÷ 3?", options: ["5", "6", "4"], answer: 0 }
        ];

        let currentQuestion = 0;
        let score = 0;
        let timeLeft = 60; 
        const form = document.getElementById('quizForm');
        const timerEl = document.getElementById('timer');
        const progressBar = document.getElementById('progressBar');

        function loadQuestion() {
            form.innerHTML = '';
            const q = questions[currentQuestion];
            const div = document.createElement('div');
            div.classList.add('mb-4');

            const label = document.createElement('label');
            label.classList.add('fw-semibold');
            label.innerText = (currentQuestion+1) + ". " + q.q;
            div.appendChild(label);

            q.options.forEach((opt, i) => {
                const optionDiv = document.createElement('div');
                optionDiv.classList.add('form-check', 'mt-2');
                const input = document.createElement('input');
                input.classList.add('form-check-input');
                input.type = 'radio';
                input.name = 'question';
                input.value = i;

                const optLabel = document.createElement('label');
                optLabel.classList.add('form-check-label');
                optLabel.innerText = opt;

                optionDiv.appendChild(input);
                optionDiv.appendChild(optLabel);
                div.appendChild(optionDiv);
            });

            form.appendChild(div);
            progressBar.style.width = ((currentQuestion)/questions.length*100) + '%';
        }

        document.getElementById('nextBtn').addEventListener('click', () => {
            const selected = form.querySelector('input[name="question"]:checked');
            if (!selected) { alert("Pilih jawaban dulu!"); return; }
            if (parseInt(selected.value) === questions[currentQuestion].answer) { score++; }
            currentQuestion++;
            if (currentQuestion < questions.length) { loadQuestion(); } 
            else { showResult(); }
        });

        function showResult() {
            form.classList.add('d-none');
            document.getElementById('quizButtons').classList.add('d-none');
            document.getElementById('result').classList.remove('d-none');
            document.getElementById('score').innerText = score;
            progressBar.style.width = '100%';
        }

        document.getElementById('retryBtn').addEventListener('click', () => {
            currentQuestion = 0;
            score = 0;
            form.classList.remove('d-none');
            document.getElementById('quizButtons').classList.remove('d-none');
            document.getElementById('result').classList.add('d-none');
            loadQuestion();
            timeLeft = 60;
        });

        const countdown = setInterval(() => {
            if (timeLeft <= 0) { clearInterval(countdown); showResult(); } 
            else { timeLeft--; timerEl.innerText = "Waktu: " + timeLeft + " detik"; }
        }, 1000);

        loadQuestion();
    </script>
</body>
</html>
