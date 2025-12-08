<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis | EduVibe</title>
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
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
        }

        .btn-primary {
            background-color: #62b6cb;
            border: none;
        }

        .btn-primary:hover {
            background-color: #439a86;
        }

        footer {
            background-color: #e7f6f2;
            padding: 20px;
            margin-top: 50px;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Navbar sama kayak siswa -->
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

    <div class="container mt-5">
        <div class="card p-4">
            <h3 class="mb-1">Hasil Kuis</h3>
            <div class="text-muted mb-3">
                Kuis: <b>{{ $kuis->nama_kuis }}</b> <br>
                Mapel: {{ $kuis->nama_matapelajaran ?? '-' }} • Materi: {{ $kuis->judul_materi ?? '-' }}
            </div>

            <div class="alert alert-success">
                Benar: <b>{{ $hasil['benar'] }}</b> / {{ $hasil['total'] }} <br>
                Nilai: <b style="font-size:20px">{{ $hasil['skor'] }}</b>
            </div>

            <div class="d-flex gap-2 flex-wrap">
                {{-- Ulangi kuis --}}
                <form method="POST" action="{{ route('siswa.kuis.ulang', $kuis->kuis_id) }}">
                    @csrf
                    <button class="btn btn-success">Ulangi Kuis</button>
                </form>

                {{-- Kembali ke detail mapel --}}
                <a class="btn btn-secondary" href="{{ route('mata_pelajaran_detail', $kuis->mata_pelajaran_id) }}">
                    Kembali ke Detail Mapel
                </a>

            </div>
        </div>
    </div>

    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>