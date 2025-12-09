<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe | Daftar Siswa</title>
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
        .btn-primary {
            background-color: #62b6cb;
            border: none;
        }
        .btn-primary:hover {
            background-color: #439a86;
        }
        .table {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
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
                    <li class="nav-item"><a href="/admin/home" class="nav-link text-dark fw-semibold">Dashboard</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark fw-semibold">Kelola Pengguna</a></li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Daftar Siswa 👩‍🎓</h2>
            <button class="btn btn-primary">+ Tambah Siswa</button>
        </div>

        <!-- Tabel Siswa -->
            <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswas as $index => $siswa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($siswa->tgl_daftar)->format('Y-m-d') }}</td>
                        <td>
                            <span class="badge {{ $siswa->status == 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $siswa->status }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data siswa</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</body>
</html>
