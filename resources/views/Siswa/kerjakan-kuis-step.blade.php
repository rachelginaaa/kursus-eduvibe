<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjakan Kuis | EduVibe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color:#f8f9fa; font-family:'Poppins',sans-serif; }
        .navbar { background:linear-gradient(90deg,#a5c9ca,#e7f6f2); }
        .navbar-brand { font-weight:bold; color:#1b4965 !important; }
        .card { border:none; border-radius:16px; box-shadow:0 4px 12px rgba(0,0,0,.08); }
        .btn-primary { background-color:#62b6cb; border:none; }
        .btn-primary:hover { background-color:#439a86; }
        footer { background-color:#e7f6f2; padding:20px; margin-top:50px; }
    </style>
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('siswa.home') }}">EduVibe</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="{{ route('siswa.home') }}" class="nav-link text-dark fw-semibold">Home</a></li>
            <li class="nav-item"><a href="/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
            <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
        </ul>
    </div>
</nav>

@php
    $disablePrev = $no <= 1;
    $isLast = $no >= $total;
    $isTimeUp = $isTimeUp ?? false;
    $sel = (string)($selected ?? '');
@endphp

<div class="container mt-5">

    @if(session('error'))
        <div class="alert alert-warning">{{ session('error') }}</div>
    @endif

    <div class="card p-4">

        <h4>{{ $kuis->nama_kuis }}</h4>
        <div class="text-muted mb-3">
            Mapel: {{ $kuis->nama_matapelajaran ?? '-' }}
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="fw-semibold">Soal {{ $no }} dari {{ $total }}</div>
            <div class="badge bg-danger fs-6" id="timer">--:--</div>
        </div>

        <div id="timeUpAlert" class="alert alert-warning {{ $isTimeUp ? '' : 'd-none' }}">
            Waktu kuis sudah habis. Silakan klik <b>Submit</b>.
        </div>

        <!-- NAVIGASI -->
        <div class="mb-3">
            <div class="fw-semibold mb-2">Navigasi Soal</div>
            <div class="d-flex flex-wrap gap-2">
                @for($i=1;$i<=$total;$i++)
                    <a href="{{ route('siswa.kuis.step',[$kuis->kuis_id,$i]) }}"
                       class="btn btn-sm {{ $i==$no?'btn-primary':'btn-outline-secondary' }} nav-soal">
                        {{ $i }}
                    </a>
                @endfor
            </div>
        </div>

        <div class="fw-semibold mb-2">{{ $soal->soal }}</div>

        <!-- FORM -->
        <form id="quizForm" method="POST"
              action="{{ route('siswa.kuis.step.save',[$kuis->kuis_id,$no]) }}">
            @csrf

            @for($i=1;$i<=4;$i++)
                <div class="form-check mb-2">
                    <input class="form-check-input"
                           type="radio"
                           name="jawaban"
                           value="{{ $i }}"
                           id="opsi{{ $i }}"
                           {{ $sel==="$i"?'checked':'' }}
                           {{ $isTimeUp?'disabled':'' }}>
                    <label class="form-check-label" for="opsi{{ $i }}">
                        {{ $soal->{'opsi'.$i} }}
                    </label>
                </div>
            @endfor

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" name="prev"
                        class="btn btn-secondary"
                        {{ ($disablePrev || $isTimeUp)?'disabled':'' }}>
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
    const endAt = {{ (int)($endAtEpoch ?? 0) }};
    const timerEl = document.getElementById('timer');
    const alertEl = document.getElementById('timeUpAlert');

    function fmt(s){
        s=Math.max(0,s);
        return String(Math.floor(s/60)).padStart(2,'0')+':'+String(s%60).padStart(2,'0');
    }

    function lockUI(){
        alertEl.classList.remove('d-none');
        document.querySelectorAll('input[type=radio]').forEach(e=>e.disabled=true);
        document.querySelectorAll('.nav-soal').forEach(a=>{
            a.classList.add('disabled');
            a.style.pointerEvents='none';
        });
        document.querySelectorAll('button[name=prev],button[name=next]').forEach(b=>b.disabled=true);
    }

    function tick(){
        const left = endAt - Math.floor(Date.now()/1000);
        timerEl.textContent = fmt(left);
        if(left<=0){ lockUI(); return; }
        setTimeout(tick,1000);
    }

    if(endAt>0) tick();
</script>

</body>
</html>
