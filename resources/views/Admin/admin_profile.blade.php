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

    <div class="container profile-header text-center">
        <div class="profile-card mx-auto col-md-6">

            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="profile-img mb-3">

            <h4 class="fw-bold">{{ $admin->nama_admin }}</h4>
            <p class="text-muted">{{ $admin->email }}</p>

            <hr>


            <div class="text-start">
                <p><strong>Email:</strong> {{ $admin->email }}</p>
                <p><strong>Username:</strong> {{ $admin->username }}</p>
                <p><strong>Tanggal Dibuat:</strong>
                    {{ \Carbon\Carbon::parse($admin->created_at)->translatedFormat('d F Y') }}
                </p>
            </div>

            <a href="/admin/profile/edit" class="btn btn-edit w-100 mb-3">
                Edit Profil
            </a>
            <footer class="text-center text-secondary mt-5">
                <p>&copy; 2025 EduVibe - Admin Panel</p>
            </footer>

</body>

</html>
