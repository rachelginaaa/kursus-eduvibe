<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tugas | EduVibe</title>
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
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
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

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">EduVibe</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="/mentor/home" class="nav-link text-dark fw-semibold">Home</a></li>
                <li class="nav-item"><a href="/mentor/kelas" class="nav-link text-dark fw-semibold">Kelas Saya</a></li>
                <li class="nav-item"><a href="/mentor/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
                <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="fw-bold text-primary mb-4">Tugas yang Anda Buat</h2>

    @php
        // Dummy data tugas
        $tugas = [
            (object)['judul' => 'Tugas Matematika Bab 1', 'deskripsi' => 'Kerjakan soal nomor 1-10', 'deadline' => '2025-11-30'],
            (object)['judul' => 'Tugas IPA: Laporan Praktikum', 'deskripsi' => 'Buat laporan praktikum tentang fotosintesis', 'deadline' => '2025-12-03'],
            (object)['judul' => 'Tugas Bahasa Indonesia', 'deskripsi' => 'Buat ringkasan cerita pendek', 'deadline' => '2025-12-05'],
        ];
    @endphp

    <div class="row g-4">
        @foreach($tugas as $t)
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <h5 class="fw-bold">{{ $t->judul }}</h5>
                <p class="text-muted">{{ $t->deskripsi }}</p>
                <span class="badge bg-primary">Deadline: {{ $t->deadline }}</span>
                <br><br>
                <a href="{{ route('mentor.lihat_submission', ['id' => $loop->index + 1]) }}" class="btn btn-primary">
                    Lihat Submission
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>
