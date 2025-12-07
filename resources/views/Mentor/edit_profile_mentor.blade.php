<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil | EduVibe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e7f6f2, #a5c9ca);
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
            background: white;
            padding: 30px;
        }
        .btn-save {
            background-color: #62b6cb;
            border: none;
            border-radius: 10px;
            font-weight: 600;
        }
        .btn-save:hover {
            background-color: #439a86;
        }
        .form-control {
            border-radius: 10px;
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
                <li class="nav-item"><a href="/mentor/dashboard" class="nav-link text-dark fw-semibold">Dashboard</a></li>
                <li class="nav-item"><a href="/mentor/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
                <li class="nav-item"><a href="/mentor/logout" class="btn btn-primary ms-3">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Edit Profile Section -->
    <div class="container my-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <h4 class="fw-bold text-center mb-4">Edit Profil Mentor</h4>

                @if(session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('mentor.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $mentor->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $mentor->no_hp) }}">
                    </div>

                    <div class="text-center mt-4 d-flex justify-content-between">
                        <a href="{{ route('Mentor.profile_mentor') }}" class="btn btn-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-save px-4">Simpan Perubahan</button>
                    </div>
                </form>
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