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
                    <li class="nav-item"><a href="#tentang" class="nav-link fw-semibold text-dark">Tentang</a></li>
                    <li class="nav-item"><a href="#fitur" class="nav-link fw-semibold text-dark">Fitur</a></li>
                    <li class="nav-item"><a href="#paket" class="nav-link fw-semibold text-dark">Paket</a></li>
                    <li class="nav-item"><a href="#kontak" class="nav-link fw-semibold text-dark">Kontak</a></li>
                    <li class="nav-item"><a href="/tutorial" class="nav-link fw-semibold text-dark">Tutorial</a></li>
                    <li class="nav-item">
                        <a href="/login" class="btn btn-primary ms-3">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-center" id="home">
        <div class="container">
            <h1>Belajar Seru dan Interaktif Bersama <span style="color:#62b6cb;">EduVibe</span></h1>
            <p class="mt-3">Platform pembelajaran online untuk siswa SD, SMP, dan SMA dengan berbagai mata pelajaran
                menarik.</p>
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
                        <img src="https://cdn-icons-png.flaticon.com/512/3652/3652269.png" width="80"
                            class="mx-auto mb-3" alt="Guru Berkualitas">
                        <h5 class="fw-bold">Guru Berkualitas</h5>
                        <p class="text-muted">Dipandu oleh pengajar berpengalaman dari berbagai bidang studi untuk
                            setiap jenjang pendidikan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" width="80"
                            class="mx-auto mb-3" alt="Materi Lengkap">
                        <h5 class="fw-bold">Materi Lengkap</h5>
                        <p class="text-muted">Kursus mencakup semua mata pelajaran utama — Matematika, Bahasa, Sains,
                            dan lainnya.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/4313/4313247.png" width="80"
                            class="mx-auto mb-3" alt="Interaktif & Menyenangkan">
                        <h5 class="fw-bold">Interaktif & Menyenangkan</h5>
                        <p class="text-muted">Belajar sambil bermain! Dilengkapi dengan video, kuis, dan latihan menarik
                            untuk setiap pelajaran.</p>
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
                EduVibe adalah platform pembelajaran yang dirancang untuk membantu siswa SD hingga SMA
                belajar dengan cara yang menyenangkan dan fleksibel. Kami percaya setiap anak bisa berkembang
                dengan dukungan teknologi dan metode pengajaran yang tepat.
            </p>
        </div>
    </section>

    <!-- Paket Pembayaran -->
    <section class="pricing text-center" id="paket">
        <div class="container">
            <h2 class="text-primary fw-bold mb-5">Paket Pembelajaran</h2>
            <div class="row g-4">
                <div class="col-md-4 d-flex">
                    <div class="card pricing-card p-4 w-100">
                        <h5 class="fw-bold mb-3">Paket A</h5>
                        <h3 class="text-success fw-bold mb-3">Rp500.000</h3>
                        <p class="text-muted">Akses 1 bulan ke seluruh materi dasar dan latihan.</p>
                        <a href="{{ route('paket.a') }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="card pricing-card p-4 w-100">
                        <h5 class="fw-bold mb-3">Paket B</h5>
                        <h3 class="text-success fw-bold mb-3">Rp1.000.000</h3>
                        <p class="text-muted">Akses 3 bulan, termasuk kelas interaktif dan evaluasi mingguan.</p>
                        <a href="{{ route('paket.b') }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="card pricing-card p-4 w-100">
                        <h5 class="fw-bold mb-3">Paket C</h5>
                        <h3 class="text-success fw-bold mb-3">Rp1.500.000</h3>
                        <p class="text-muted">Akses 6 bulan penuh dengan bimbingan mentor pribadi.</p>
                        <a href="{{ route('paket.c') }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center" id="kontak">
        <div class="container">
            <h5 class="fw-bold text-primary mb-3">Hubungi Kami</h5>
            <p>Email: <a href="mailto:info@eduvibe.com">info@eduvibe.com</a></p>
            <div class="mt-3">
                <a href="https://facebook.com" target="_blank">Facebook</a> |
                <a href="https://instagram.com" target="_blank">Instagram</a> |
                <a href="https://twitter.com" target="_blank">Twitter</a> |
                <a href="https://youtube.com" target="_blank">YouTube</a>
            </div>
            <p class="mt-4 mb-0 text-secondary">&copy; 2025 EduVibe. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>