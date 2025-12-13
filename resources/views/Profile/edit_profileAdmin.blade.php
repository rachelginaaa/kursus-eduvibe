<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe | Profil Admin</title>
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
            background: white;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">EduVibe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/admin/dashboard" class="nav-link text-dark fw-semibold">Dashboard</a>
                    </li>
                    <li class="nav-item"><a href="/admin/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container profile-header ">
        <div class="profile-card mx-auto col-md-6">
            <form action="/admin/profile/update" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama_admin" class="form-control" value="{{ $admin->nama_admin }}" required>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $admin->username }}" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
                </div>

                <hr>

                <h6 class="fw-bold">Ganti Password (Opsional)</h6>

                <div class="mb-3">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <button class="btn btn-primary">Simpan Perubahan</button>
                <a href="/admin/profile" class="btn btn-secondary ms-2">Kembali</a>
            </form>
        </div>
    </div>

    <footer class="text-center text-secondary mt-5">
        <p>&copy; 2025 EduVibe - Admin Panel</p>
    </footer>

</body>

</html>
