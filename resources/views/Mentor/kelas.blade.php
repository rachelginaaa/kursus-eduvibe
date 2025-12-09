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

        /* BUTTON STYLES — sama seperti halaman dashboard */
        .btn-main-blue {
            background-color: #62b6cb !important;
            border: none !important;
            color: white !important;
        }

        .btn-main-blue:hover {
            background-color: #439a86 !important;
            color: white !important;
        }

        /* Soft Green khusus Kelola Kuis */
        .btn-soft-green {
            background-color: #c7f2c5 !important;
            border: 1px solid #a8d9a6 !important;
            color: #2f6b2f !important;
        }

        .btn-soft-green:hover {
            background-color: #b0e9ad !important;
            border-color: #96cf94 !important;
            color: #245a24 !important;
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

                                    <!-- Kelola Materi: warna biru sama seperti Logout -->
                                    <a href="{{ route('mentor.materi', $k->mata_pelajaran_id) }}"
                                        class="btn btn-sm btn-main-blue">
                                        Kelola Materi
                                    </a>

                                    <!-- Kelola Kuis: hijau soft -->
                                    <a href="{{ route('mentor.kuis.index', $k->mata_pelajaran_id) }}"
                                        class="btn btn-sm btn-soft-green">
                                        Kelola Kuis
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif
    </div>

    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Bersama Membangun Generasi Cerdas</p>
    </footer>

</body>

</html>
