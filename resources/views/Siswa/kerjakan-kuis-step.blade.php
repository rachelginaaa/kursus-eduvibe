<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kerjakan Kuis | EduVibe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
    .navbar { background: linear-gradient(90deg, #a5c9ca, #e7f6f2); }
    .navbar-brand { font-weight: bold; color: #1b4965 !important; }
    .card { border: none; border-radius: 16px; box-shadow: 0 4px 12px rgba(0, 0, 0, .08); }
    .btn-primary { background-color: #62b6cb; border: none; }
    .btn-primary:hover { background-color: #439a86; }
    footer { background-color: #e7f6f2; padding: 20px; margin-top: 50px; }
  </style>
</head>

<body class="bg-light">

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

  <div class="container mt-5">

    @php
      $err = session('error');
      $hasil = session('hasil');
      $disablePrev = $no <= 1;
      $isLast = $no >= $total;
      $isTimeUp = $isTimeUp ?? false;
      $sel = (string) ($selected ?? '');
    @endphp

    @if($err)
      <div class="alert alert-warning">{{ $err }}</div>
    @endif

    @if($hasil)
      <div class="alert alert-success">
        Benar: <b>{{ $hasil['benar'] }}</b> / {{ $hasil['total'] }} • Nilai: <b>{{ $hasil['skor'] }}</b>
      </div>
    @endif

    <div class="card p-4 mb-3">
      <h4 class="mb-1">{{ $kuis->nama_kuis }}</h4>
      <div class="text-muted mb-3">
        Mapel: {{ $kuis->nama_matapelajaran ?? '-' }} • Materi: {{ $kuis->judul_materi ?? '-' }}
      </div>

      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="fw-semibold mb-0">Soal {{ $no }} dari {{ $total }}</div>
        <div class="badge bg-danger fs-6" id="timer">--:--</div>
      </div>

      {{-- Alert time up: default tampil jika dari server sudah time up --}}
      <div class="alert alert-warning mt-2 {{ $isTimeUp ? '' : 'd-none' }}" id="timeUpAlert">
        Waktu kuis sudah habis. Silakan klik <b>Submit</b>.
      </div>

      {{-- Navigasi nomor --}}
      <div class="mb-3">
        <div class="fw-semibold mb-2">Navigasi Soal</div>
        <div class="d-flex flex-wrap gap-2">
          @for($i = 1; $i <= $total; $i++)
            @php $kelas = ($i == $no) ? 'btn-primary' : 'btn-outline-secondary'; @endphp
            <a
              href="{{ route('siswa.kuis.step', [$kuis->kuis_id, $i]) }}"
              class="btn btn-sm nav-soal {{ $kelas }} {{ $isTimeUp ? 'disabled' : '' }}"
              style="{{ $isTimeUp ? 'pointer-events:none; opacity:.6;' : '' }}"
            >{{ $i }}</a>
          @endfor
        </div>
      </div>

      <div class="fw-semibold mb-2">{{ $soal->soal }}</div>

      <form id="quizForm" method="POST" action="{{ route('siswa.kuis.step.save', [$kuis->kuis_id, $no]) }}">
        @csrf

        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="jawaban" value="1" id="opsi1"
            {{ $sel === '1' ? 'checked' : '' }} {{ $isTimeUp ? 'disabled' : '' }}>
          <label class="form-check-label" for="opsi1">{{ $soal->opsi1 }}</label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="jawaban" value="2" id="opsi2"
            {{ $sel === '2' ? 'checked' : '' }} {{ $isTimeUp ? 'disabled' : '' }}>
          <label class="form-check-label" for="opsi2">{{ $soal->opsi2 }}</label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="jawaban" value="3" id="opsi3"
            {{ $sel === '3' ? 'checked' : '' }} {{ $isTimeUp ? 'disabled' : '' }}>
          <label class="form-check-label" for="opsi3">{{ $soal->opsi3 }}</label>
        </div>

        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="jawaban" value="4" id="opsi4"
            {{ $sel === '4' ? 'checked' : '' }} {{ $isTimeUp ? 'disabled' : '' }}>
          <label class="form-check-label" for="opsi4">{{ $soal->opsi4 }}</label>
        </div>

        <div class="d-flex justify-content-between">
          <button type="submit" name="prev" class="btn btn-secondary"
            {{ ($disablePrev || $isTimeUp) ? 'disabled' : '' }}>
            Prev
          </button>

          @if(!$isLast && !$isTimeUp)
            <button type="submit" name="next" class="btn btn-primary">Next</button>
          @else
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
          @endif
        </div>
      </form>
    </div>
  </div>

  <footer class="text-center text-secondary">
    <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const endAt = {{ (int) ($endAtEpoch ?? 0) }};
    const timerEl = document.getElementById('timer');
    const timeUpAlert = document.getElementById('timeUpAlert');

    function fmt(sec) {
      sec = Math.max(0, sec);
      const m = Math.floor(sec / 60);
      const s = sec % 60;
      return String(m).padStart(2, '0') + ':' + String(s).padStart(2, '0');
    }

    function lockUI() {
      // tampilkan alert
      if (timeUpAlert) timeUpAlert.classList.remove('d-none');

      // disable semua radio jawaban
      document.querySelectorAll('input[type="radio"][name="jawaban"]').forEach(el => {
        el.disabled = true;
      });

      // disable tombol prev/next (submit tetap aktif)
      document.querySelectorAll('button[name="prev"], button[name="next"]').forEach(btn => {
        btn.disabled = true;
      });

      // matiin navigasi nomor
      document.querySelectorAll('.nav-soal').forEach(a => {
        a.classList.add('disabled');
        a.style.pointerEvents = 'none';
        a.style.opacity = '0.6';
        a.href = 'javascript:void(0)';
      });
    }

    function tick() {
      const now = Math.floor(Date.now() / 1000);
      const left = endAt - now;

      if (timerEl) timerEl.textContent = fmt(left);

      if (left <= 0) {
        if (timerEl) timerEl.textContent = "00:00";
        lockUI();
        return;
      }

      setTimeout(tick, 1000);
    }

    if (endAt > 0) tick();
  </script>
</body>

</html>
