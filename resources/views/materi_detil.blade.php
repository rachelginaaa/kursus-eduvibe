<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $materi->judul_materi }} | EduVibe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
        .navbar { background: linear-gradient(90deg, #a5c9ca, #e7f6f2); }
        .navbar-brand { font-weight: bold; color: #1b4965 !important; }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 30px;
        }
        footer { background-color: #e7f6f2; padding: 20px; margin-top: 50px; }
        h2 { color: #1b4965; font-weight: bold; }
    </style>
</head>

<body>

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

    <a href="javascript:history.back()" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card">
        <h2>{{ $materi->judul_materi }}</h2>

        <p class="text-muted mb-2">
            Upload: {{ $materi->tgl_upload }} • Jenjang: {{ $materi->jenjang }}
        </p>

        <p>{{ $materi->deskripsi }}</p>

        <hr>

        @if($materi->file)
            <a href="{{ \Illuminate\Support\Facades\Storage::url($materi->file) }}"
               class="btn btn-primary"
               target="_blank">
                Lihat File Materi
            </a>
        @else
            <p class="text-danger">Tidak ada file materi.</p>
        @endif
    </div>

</div>

<footer class="text-center text-secondary">
    <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
