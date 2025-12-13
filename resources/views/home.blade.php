<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe | Dashboard Siswa</title>
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

        .welcome {
            margin-top: 80px;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">EduVibe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/home" class="nav-link text-dark fw-semibold">Home</a></li>
                    <li class="nav-item"><a href="/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="container text-center welcome">
        <h1 class="fw-bold text-primary">Selamat Datang di EduVibe 🎓</h1>
        <p class="text-muted">
            Belajar lebih mudah dan menyenangkan untuk semua jenjang pendidikan.
        </p>
    </div>

    <div class="container mt-5">

        {{-- ============================
        1. JIKA BELUM PUNYA PAKET
        ============================ --}}
        @if(!$punyaPaket)
            <h3 class="fw-bold text-primary mt-5 mb-4">Pilih Paket Pembelajaran</h3>

            <div class="row g-4">
                @foreach($pakets as $paket)
                    <div class="col-md-4 d-flex">
                        <div class="card p-4 text-center w-100">
                            <h5 class="fw-bold">{{ $paket->nama_paket_pelajaran }}</h5>
                            <p class="text-muted">{{ Str::limit($paket->deskripsi, 100) }}</p>
                            <p class="text-muted">{{ Str::limit($paket->harga, 100) }}</p>

                            <form action="{{ route('siswa.pilihPaket') }}" method="POST">
                                @csrf
                                <button name="paket_pelajaran_id" value="{{ $paket->paket_pelajaran_id }}">Pilih</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else


            {{-- ============================
            2. JIKA SUDAH PUNYA PAKET
            ============================ --}}
            <h3 class="text-center mb-4 fw-bold text-secondary">Mata Pelajaran Kamu</h3>

            <div class="row g-4">
                @foreach($mataPelajarans as $mapel)
                    <div class="col-md-4">
                        <div class="card p-4 text-center">
                            <img src="{{ $mapel->gambar ?? 'https://cdn-icons-png.flaticon.com/512/2920/2920237.png' }}"
                                width="80" class="mx-auto mb-3">

                            <h5 class="fw-bold">{{ $mapel->nama_matapelajaran }}</h5>
                            <p class="text-muted">{{ Str::limit($mapel->deskripsi, 100) }}</p>

                            <a href="{{ route('mata_pelajaran_detail', $mapel->mata_pelajaran_id) }}" class="btn btn-primary">
                                Mulai Belajar
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif

    </div>

    <footer class="text-center text-secondary mt-5">
        <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
    </footer>

</body>

</html>
