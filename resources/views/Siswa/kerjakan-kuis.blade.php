<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kerjakan Kuis | EduVibe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color:#f8f9fa; font-family:'Poppins',sans-serif; }

    .navbar { background: linear-gradient(90deg, #a5c9ca, #e7f6f2); }
    .navbar-brand { font-weight:bold; color:#1b4965 !important; }

    .card { border:none; border-radius:16px; box-shadow:0 4px 12px rgba(0,0,0,.08); }

    .btn-primary { background-color:#62b6cb; border:none; }
    .btn-primary:hover { background-color:#439a86; }

    footer { background-color:#e7f6f2; padding:20px; margin-top:50px; }
  </style>
</head>

<body class="bg-light">

  <!-- NAVBAR / HEADER -->
  <nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ route('siswa.home') }}">EduVibe</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="{{ route('siswa.home') }}" class="nav-link text-dark fw-semibold">Home</a>
          </li>
          <li class="nav-item">
            <a href="/profile" class="nav-link text-dark fw-semibold">Profil</a>
          </li>
          <li class="nav-item">
            <a href="/" class="btn btn-primary ms-3">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CONTENT -->
  <div class="container mt-5">
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card p-4 mb-4">
      <h3 class="mb-1">{{ $kuis->nama_kuis }}</h3>
      <div class="text-muted">
        Mapel: {{ $kuis->nama_matapelajaran ?? '-' }} • Materi: {{ $kuis->judul_materi ?? '-' }}
      </div>

      @if(session('hasil'))
        @php($h = session('hasil'))
        <div class="alert alert-success mt-3 mb-0">
          Benar: <b>{{ $h['benar'] }}</b> / {{ $h['total'] }} • Skor: <b>{{ $h['skor'] }}</b>
        </div>
      @endif
    </div>

    <form method="POST" action="{{ route('siswa.kuis.submit', $kuis->kuis_id) }}">
      @csrf

      @foreach($soal as $idx => $s)
        <div class="card p-4 mb-3">
          <div class="fw-semibold mb-2">{{ $idx+1 }}. {{ $s->soal }}</div>

          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="jawaban[{{ $s->soal_id }}]" value="1" id="s{{ $s->soal_id }}_1">
            <label class="form-check-label" for="s{{ $s->soal_id }}_1">{{ $s->opsi1 }}</label>
          </div>

          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="jawaban[{{ $s->soal_id }}]" value="2" id="s{{ $s->soal_id }}_2">
            <label class="form-check-label" for="s{{ $s->soal_id }}_2">{{ $s->opsi2 }}</label>
          </div>

          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="jawaban[{{ $s->soal_id }}]" value="3" id="s{{ $s->soal_id }}_3">
            <label class="form-check-label" for="s{{ $s->soal_id }}_3">{{ $s->opsi3 }}</label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="jawaban[{{ $s->soal_id }}]" value="4" id="s{{ $s->soal_id }}_4">
            <label class="form-check-label" for="s{{ $s->soal_id }}_4">{{ $s->opsi4 }}</label>
          </div>
        </div>
      @endforeach

      <div class="text-center mb-5">
        <button class="btn btn-primary px-4 py-2">Submit Jawaban</button>
      </div>
    </form>
  </div>

  <!-- FOOTER -->
  <footer class="text-center text-secondary">
    <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
