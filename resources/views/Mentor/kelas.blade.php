<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas yang Diajarkan | EduVibe</title>
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
        footer {
            background-color: #e7f6f2;
            padding: 20px;
            margin-top: 50px;
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

    <!-- TITLE -->
    <div class="container mt-5">
        <h2 class="fw-bold text-primary mb-4">Kelas yang Anda Ajar</h2>

        @if($kelas->isEmpty())
            <div class="alert alert-warning">
                Anda belum mengajar kelas apa pun.
            </div>
        @else

        <!-- LIST KELAS -->
        <div class="row g-4">
            @foreach ($kelas as $k)
            <div class="col-md-4">
                <div class="card p-4">
                    <h5 class="fw-bold">{{ $k->nama_matapelajaran }}</h5>
                    <p class="text-muted">{{ $k->deskripsi }}</p>

                    <span class="badge bg-primary">{{ $k->jenjang }}</span>

                    <a href="#" class="btn btn-sm btn-primary mt-3">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        @endif
    </div>

    <!-- FOOTER -->
    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Bersama Membangun Generasi Cerdas</p>
    </footer>

</body>
</html>
