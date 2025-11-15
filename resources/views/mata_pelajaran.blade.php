<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mataPelajaran->nama_matapelajaran }} - EduVibe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background: linear-gradient(90deg, #a5c9ca, #e7f6f2);
        }
        .navbar-brand {
            font-weight: bold;
            color: #1b4965 !important;
        }
        .card {
            border-radius: 15px;
            padding: 20px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #62b6cb;
            border: none;
        }
        .btn-primary:hover {
            background-color: #439a86;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/home">EduVibe</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="/home" class="nav-link text-dark fw-semibold">Home</a></li>
                <li class="nav-item"><a href="/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
                <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <h2 class="fw-bold mb-4">
        📘 {{ $mataPelajaran->nama_matapelajaran }}
    </h2>

    <p class="text-muted">
        {{ $mataPelajaran->deskripsi ?? 'Tidak ada deskripsi.' }}
    </p>

    <hr>

    <h4 class="fw-semibold mb-3">Daftar Materi</h4>

    @if($materi->isEmpty())
        <div class="alert alert-warning">
            Belum ada materi yang ditambahkan.
        </div>
    @else
        <div class="row g-3">
            @foreach($materi as $m)
            <div class="col-md-4">
                <div class="card">
                    <h5 class="fw-bold">{{ $m->judul }}</h5>
                    <p class="text-muted">{{ $m->deskripsi }}</p>

                    <a href="{{ asset('materi/'.$m->file) }}" 
                       download 
                       class="btn btn-primary w-100">
                        Download Materi
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
