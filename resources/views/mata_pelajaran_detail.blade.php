<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mapel->nama_matapelajaran }} | EduVibe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
        .navbar { background: linear-gradient(90deg, #a5c9ca, #e7f6f2); }
        .navbar-brand { font-weight: bold; color: #1b4965 !important; }
        .card { 
            border: none; 
            border-radius: 20px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
            transition: 0.3s; 
            padding: 30px; 
        }
        .btn-primary { background-color: #62b6cb; border: none; }
        .btn-primary:hover { background-color: #439a86; }
        footer { background-color: #e7f6f2; padding: 20px; margin-top: 50px; }
        .back-btn { margin-bottom: 20px; }
        h2 { color: #1b4965; font-weight: bold; }
        .kuis-btn {
            font-size: 1.2rem;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .kuis-btn img { margin-right: 0.75rem; filter: invert(1); } /* Warna putih */
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

    <!-- Detail Mata Pelajaran -->
    <div class="container mt-5">
        <a href="{{ route('home') }}" class="btn btn-secondary back-btn">← Kembali ke Home</a>

        <a href="{{ route('siswa.home') }}" class="btn btn-secondary back-btn">← Kembali ke Home</a>
        <div class="card text-center">
            <img src="{{ $mapel->gambar ?? 'https://cdn-icons-png.flaticon.com/512/2920/2920237.png' }}"
                 width="120" class="mb-3" alt="{{ $mapel->nama_matapelajaran }}">

            <h2>{{ $mapel->nama_matapelajaran }}</h2>
            <p class="text-muted mt-3">{{ $mapel->deskripsi }}</p>
            <p class="fw-semibold mt-3">
                Mentor: {{ $mapel->mentor->nama ?? 'Belum ada mentor' }}
            </p>

            <!-- Tombol Kuis -->
            <a href="{{ route('mata_pelajaran.kuis', $mapel->mata_pelajaran_id) }}" 
               class="btn btn-primary mt-4 kuis-btn">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828911.png" 
                     alt="Matematika" width="28">
                Kuis 1
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
