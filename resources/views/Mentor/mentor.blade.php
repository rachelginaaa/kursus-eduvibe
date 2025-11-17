<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe | Dashboard Mentor</title>
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
                    <li class="nav-item"><a href="/mentor/home" class="nav-link text-dark fw-semibold">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark fw-semibold">Kelas Saya</a></li>
                    <li class="nav-item"><a href="/mentor/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="container text-center welcome">
        <h1 class="fw-bold text-primary">Selamat Datang, Mentor EduVibe 👨‍🏫</h1>
        <p class="text-muted">Bagikan ilmu dan bantu siswa mencapai potensi terbaik mereka.</p>
    </div>

    <!-- Kartu Mentor -->
    <div class="container mt-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" width="80" class="mx-auto mb-3" alt="Kelas">
                    <h5 class="fw-bold">Kelas yang Diajarkan</h5>
                    <p class="text-muted">Kelola materi, tugas, dan jadwal pembelajaran untuk siswa Anda.</p>
                    <button class="btn btn-primary">Lihat Kelas</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4205/4205358.png" width="80" class="mx-auto mb-3" alt="Tugas">
                    <h5 class="fw-bold">Penilaian & Tugas</h5>
                    <p class="text-muted">Periksa tugas, berikan nilai, dan umpan balik untuk siswa.</p>
                    <button class="btn btn-primary">Kelola Tugas</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png" width="80" class="mx-auto mb-3" alt="Peserta">
                    <h5 class="fw-bold">Data Siswa</h5>
                    <p class="text-muted">Pantau perkembangan dan keaktifan siswa dalam setiap kelas.</p>
                    <button class="btn btn-primary">Lihat Siswa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Bersama Membangun Generasi Cerdas</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
