<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Tugas | EduVibe</title>
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
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">EduVibe</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="/mentor/dashboard" class="nav-link text-dark fw-semibold">Home</a></li>
                <li class="nav-item"><a href="/mentor/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
                <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="fw-bold text-primary mb-4">Submission Siswa untuk Tugas #{{ $id }}</h2>

    <div class="card p-4">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Submit</th>
                    <th>File / Jawaban</th>
                    <th>Nilai</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissions as $index => $sub)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $sub->siswa_nama }}</td>
                        <td>{{ $sub->tgl_submit }}</td>
                        <td><a href="#">{{ $sub->file }}</a></td>
                        <td>{{ $sub->nilai ?? '-' }}</td>
                        <td>{{ $sub->feedback ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
