<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket A - EduVibe</title>
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

        /* Tombol login warna #62b6cb */
        .btn-eduvibe {
            background-color: #62b6cb;
            color: white;
            border: none;
            transition: background-color 0.2s ease;
        }

        .btn-eduvibe:hover {
            background-color: #4da7bd;
            color: white;
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

    <!-- Header -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">EduVibe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/" class="nav-link fw-semibold text-dark">Beranda</a></li>
                    <li class="nav-item"><a href="/paket/a" class="nav-link fw-semibold text-dark">Paket A</a></li>
                    <li class="nav-item"><a href="/paket/b" class="nav-link fw-semibold text-dark">Paket B</a></li>
                    <li class="nav-item"><a href="/paket/c" class="nav-link fw-semibold text-dark">Paket C</a></li>
                    <li class="nav-item"><a href="/tutorial" class="nav-link fw-semibold text-dark">Tutorial</a></li>
                    <li class="nav-item"><a href="/login" class="btn btn-eduvibe ms-3">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Isi Halaman Paket -->
    <div class="container text-center py-5">
        <h1 class="fw-bold text-primary mb-3">Paket A</h1>
        <p class="text-muted">Akses 1 bulan ke seluruh materi dasar dan latihan.</p>
        <h3 class="text-success fw-bold">Rp500.000</h3>
        <a href="/" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
    </div>

    <!-- Footer (sama seperti landing page) -->
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
