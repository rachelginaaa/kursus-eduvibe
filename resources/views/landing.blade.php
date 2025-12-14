<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe - Belajar Seru untuk Semua Jenjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .navbar {
            background: linear-gradient(90deg, #a5c9ca, #e7f6f2);
        }

        .navbar-brand {
            color: #1b4965 !important;
            font-weight: 700;
        }

        .hero {
            background: linear-gradient(to right, #e7f6f2, #f8f9fa);
            padding: 100px 0;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #1b4965;
        }

        .hero p {
            font-size: 1.2rem;
            color: #555;
        }

        .btn-primary {
            background-color: #62b6cb;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #439a86;
        }

        .features {
            padding: 80px 0;
        }

        .feature-card {
            border: none;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        /* ✅ PERBAIKAN UKURAN IKON (INI SAJA YANG DITAMBAHKAN) */
        .feature-icon {
            width: 80px;
            height: 80px;
            object-fit: contain;
            display: block;
            margin: 0 auto 12px;
        }

        .pricing {
            background-color: #ffffff;
            padding: 80px 0;
        }

        .pricing-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
        }

        .footer {
            background-color: #e7f6f2;
            padding: 40px 0;
        }

        .footer a {
            text-decoration: none;
            color: #1b4965;
            margin: 0 10px;
        }

        .footer a:hover {
            color: #439a86;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">EduVibe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#home" class="nav-link fw-semibold text-dark">Beranda</a></li>
                    <li class="nav-item"><a href="#fitur" class="nav-link fw-semibold text-dark">Fitur</a></li>
                    <li class="nav-item"><a href="#tentang" class="nav-link fw-semibold text-dark">Tentang</a></li>
                    <li class="nav-item"><a href="#paket" class="nav-link fw-semibold text-dark">Paket</a></li>
                    <li class="nav-item"><a href="#kontak" class="nav-link fw-semibold text-dark">Kontak</a></li>
                    <li class="nav-item"><a href="/tutorial" class="nav-link fw-semibold text-dark">Tutorial</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-primary text-white ms-3 px-3" href="#"
                           id="loginDropdown" role="button" data-bs-toggle="dropdown">
                            Login
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/login">Login Siswa</a></li>
                            <li><a class="dropdown-item" href="/mentor/login">Login Mentor</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero text-center" id="home">
        <div class="container">
            <h1>Belajar Seru dan Interaktif Bersama <span style="color:#62b6cb;">EduVibe</span></h1>
            <p class="mt-3">Platform pembelajaran online untuk siswa SD, SMP, dan SMA dengan berbagai mata pelajaran menarik.</p>
            <a href="/login" class="btn btn-primary btn-lg mt-4">Mulai Belajar Sekarang</a>
        </div>
    </section>

    <!-- Fitur -->
    <section class="features" id="fitur">
        <div class="container text-center">
            <h2 class="mb-5 text-primary fw-bold">Kenapa Pilih EduVibe?</h2>
            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card feature-card p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2354/2354280.png"
                             class="feature-icon" alt="Guru Berkualitas">
                        <h5 class="fw-bold">Guru Berkualitas</h5>
                        <p class="text-muted">Dipandu oleh pengajar berpengalaman dari berbagai bidang studi.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                             class="feature-icon" alt="Materi Lengkap">
                        <h5 class="fw-bold">Materi Lengkap</h5>
                        <p class="text-muted">Mencakup semua mata pelajaran utama.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/4313/4313247.png"
                             class="feature-icon" alt="Interaktif">
                        <h5 class="fw-bold">Interaktif & Menyenangkan</h5>
                        <p class="text-muted">Video, kuis, dan latihan menarik.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Tentang -->
    <section class="py-5 bg-light" id="tentang">
        <div class="container text-center">
            <h2 class="text-primary fw-bold mb-4">Tentang EduVibe</h2>
            <p class="lead mx-auto" style="max-width: 700px;">
                EduVibe adalah platform pembelajaran yang dirancang untuk membantu siswa belajar dengan cara yang menyenangkan dan fleksibel.
            </p>
        </div>
    </section>

    <!-- Paket -->
    <section class="pricing text-center" id="paket">
        <div class="container">
            <h2 class="text-primary fw-bold mb-5">Paket Pembelajaran</h2>
            <div class="row g-4">
                <div class="col-md-4 d-flex">
                    <div class="card pricing-card p-4 w-100">
                        <h5 class="fw-bold">Paket A - Dasar</h5>
                        <h3 class="text-success fw-bold">Rp500.000</h3>
                        <p class="text-muted">Akses 1 bulan.</p>
                        <a href="{{ route('paket.a') }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="card pricing-card p-4 w-100">
                        <h5 class="fw-bold">Paket B - Premium</h5>
                        <h3 class="text-success fw-bold">Rp1.000.000</h3>
                        <p class="text-muted">Akses 3 bulan.</p>
                        <a href="{{ route('paket.b') }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="card pricing-card p-4 w-100">
                        <h5 class="fw-bold">Paket C - Elite</h5>
                        <h3 class="text-success fw-bold">Rp1.500.000</h3>
                        <p class="text-muted">Akses 6 bulan.</p>
                        <a href="{{ route('paket.c') }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center" id="kontak">
        <div class="container">
            <p class="mb-0 text-secondary">&copy; 2025 EduVibe. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
