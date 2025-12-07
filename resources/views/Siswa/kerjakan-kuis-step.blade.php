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

<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('siswa.home') }}">EduVibe</a>
  </div>
</nav>

<div class="container mt-5">
  <a href="javascript:history.back()" class="btn btn-secondary mb-3">← Kembali</a>

  @if(session('error'))
    <div class="alert alert-warning">{{ session('error') }}</div>
  @endif

  @if(session('hasil'))
    @php($h = session('hasil'))
    <div class="alert alert-success">
      Benar: <b>{{ $h['benar'] }}</b> / {{ $h['total'] }} • Nilai: <b>{{ $h['skor'] }}</b>
    </div>
  @endif

  <div class="card p-4 mb-3">
    <h4 class="mb-1">{{ $kuis->nama_kuis }}</h4>
    <div class="text-muted mb-3">
      Mapel: {{ $kuis->nama_matapelajaran ?? '-' }} • Materi: {{ $kuis->judul_materi ?? '-' }}
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="fw-semibold">Soal {{ $no }} dari {{ $total }}</div>
      <div class="progress" style="width: 55%; height: 18px;">
        <div class="progress-bar" style="width: {{ round(($no/$total)*100) }}%"></div>
      </div>
    </div>

    <div class="fw-semibold mb-2">{{ $soal->soal }}</div>

    <form method="POST" action="{{ route('siswa.kuis.step.save', [$kuis->kuis_id, $no]) }}">
      @csrf

      @php($sel = (string)($selected ?? ''))

      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="jawaban" value="1" id="opsi1" {{ $sel==='1'?'checked':'' }}>
        <label class="form-check-label" for="opsi1">{{ $soal->opsi1 }}</label>
      </div>

      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="jawaban" value="2" id="opsi2" {{ $sel==='2'?'checked':'' }}>
        <label class="form-check-label" for="opsi2">{{ $soal->opsi2 }}</label>
      </div>

      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="jawaban" value="3" id="opsi3" {{ $sel==='3'?'checked':'' }}>
        <label class="form-check-label" for="opsi3">{{ $soal->opsi3 }}</label>
      </div>

      <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="jawaban" value="4" id="opsi4" {{ $sel==='4'?'checked':'' }}>
        <label class="form-check-label" for="opsi4">{{ $soal->opsi4 }}</label>
      </div>

      <div class="d-flex justify-content-between">
        <button type="submit" name="prev" class="btn btn-secondary" {{ $no<=1?'disabled':'' }}>Prev</button>

        @if($no < $total)
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
</body>
</html>
