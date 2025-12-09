<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe | Profil Siswa</title>
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
        .profile-header {
            margin-top: 80px;
        }
        .profile-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            background: white;
            padding: 30px;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #62b6cb;
        }
        .btn-edit {
            background-color: #62b6cb;
            border: none;
        }
        .btn-edit:hover {
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

    <!-- Profil Section -->
    <div class="container profile-header text-center">
        <div class="profile-card mx-auto col-md-6">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User" class="profile-img mb-3">
           <h4 class="fw-bold">{{ $user->nama }}</h4>
                <p class="text-muted">{{ $user->email }}</p>
            <hr>

            <div class="text-start">
                <p><strong>Email:</strong> {{ $user->email ?? '-' }}</p>
                <p><strong>No. HP:</strong> {{ $user->no_hp ?? '-' }}</p>
                <p><strong>Tanggal Bergabung:</strong>
                    {{ \Carbon\Carbon::parse($user->tgl_daftar)->translatedFormat('d F Y') ?? '-' }}
                </p>
            </div>


            <a href="{{ route('profile.edit') }}" class="btn btn-edit mt-3">Edit Profil</a>
        </div>

        <!-- Progress Belajar -->
        <div class="mt-5 col-md-8 mx-auto">
            <h5 class="fw-bold text-primary mb-3">Progress Belajar 📈</h5>
            <div class="card p-4">
                <p><strong>Matematika:</strong></p>
                <div class="progress mb-3">
                    <div class="progress-bar bg-info" style="width: 75%">75%</div>
                </div>

                <p><strong>Bahasa Indonesia:</strong></p>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width: 50%">50%</div>
                </div>

                <p><strong>IPA:</strong></p>
                <div class="progress mb-3">
                    <div class="progress-bar bg-warning" style="width: 30%">30%</div>
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
