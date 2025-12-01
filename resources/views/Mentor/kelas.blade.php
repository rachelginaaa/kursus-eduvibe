<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas yang Diajarkan | EduVibe</title>
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
        footer {
            background-color: #e7f6f2;
            padding: 20px;
            margin-top: 50px;
        }
        .table thead {
            background-color: #62b6cb;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #eefbff;
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
                    <li class="nav-item"><a href="/mentor/home" class="nav-link text-dark fw-semibold">Home</a></li>
                    <li class="nav-item"><a href="/mentor/kelas" class="nav-link text-dark fw-semibold">Kelas Saya</a></li>
                    <li class="nav-item"><a href="/mentor/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- TITLE -->
    <div class="container mt-5">
        <h2 class="fw-bold text-primary mb-4">Kelas yang Anda Ajar</h2>

        @if($kelas->isEmpty())
            <div class="alert alert-warning">Anda belum mengajar kelas apa pun.</div>
        @else

        <div class="card p-4 shadow-sm">
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>ID Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Deskripsi</th>
                        <th>Jenjang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kelas as $k)
                    <tr>
                        <td class="text-center">{{ $k->kelas_id }}</td>
                        <td>{{ $k->nama_matapelajaran }}</td>
                        <td>{{ $k->deskripsi }}</td>
                        <td class="text-center">{{ $k->jenjang }}</td>
                        <td class="text-center">
                            <a href="{{ route('mentor.kelas', $k->kelas_id) }}" class="btn btn-sm btn-primary">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif
    </div>

    <!-- FOOTER -->
    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Bersama Membangun Generasi Cerdas</p>
    </footer>

</body>
</html>
