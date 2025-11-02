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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">EduVibe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/home" class="nav-link text-dark fw-semibold">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark fw-semibold">Kursus Saya</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark fw-semibold">Profil</a></li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="container text-center welcome">
        <h1 class="fw-bold text-primary">Selamat Datang di EduVibe 🎓</h1>
        <p class="text-muted">Belajar lebih mudah dan menyenangkan untuk semua jenjang pendidikan.</p>
    </div>

    <!-- Kartu Kursus -->
    <div class="container mt-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2920/2920237.png" width="80" class="mx-auto mb-3" alt="Matematika">
                    <h5 class="fw-bold">Matematika</h5>
                    <p class="text-muted">Kuasai konsep dasar hingga lanjutan dengan cara yang mudah dipahami.</p>
                    <button class="btn btn-primary">Mulai Belajar</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" width="80" class="mx-auto mb-3" alt="Bahasa Indonesia">
                    <h5 class="fw-bold">Bahasa Indonesia</h5>
                    <p class="text-muted">Pelajari tata bahasa, menulis, dan memahami bacaan dengan lebih baik.</p>
                    <button class="btn btn-primary">Mulai Belajar</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3062/3062634.png" width="80" class="mx-auto mb-3" alt="IPA">
                    <h5 class="fw-bold">IPA</h5>
                    <p class="text-muted">Eksperimen dan temukan keajaiban sains dalam kehidupan sehari-hari.</p>
                    <button class="btn btn-primary">Mulai Belajar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
