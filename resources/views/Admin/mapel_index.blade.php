<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe | Mata Pelajaran Paket {{ $paket->nama_paket_pelajaran }}</title>
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/admin/dashboard">EduVibe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/admin/dashboard" class="nav-link text-dark fw-semibold">Dashboard</a>
                    </li>
                    <li class="nav-item"><a href="/admin/siswa" class="nav-link text-dark fw-semibold">Siswa</a></li>
                    <li class="nav-item"><a href="/admin/mentor" class="nav-link text-dark fw-semibold">Mentor</a></li>
                    <li class="nav-item"><a href="/admin/paket" class="nav-link text-dark fw-semibold">Paket</a></li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Mata Pelajaran Paket: {{ $paket->nama_paket_pelajaran }}</h2>
            <a href="/admin/paket" class="btn btn-secondary mb-3">← Kembali</a>
        </div>

        <a href="/admin/mataPelajaran/create/{{ $paket->paket_pelajaran_id }}" class="btn btn-primary mb-3">
            + Tambah Mata Pelajaran
        </a>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Deskripsi</th>
                        <th>Jenjang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($paket->mataPelajaran as $index => $mp)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mp->nama_matapelajaran }}</td>
                            <td>{{ $mp->deskripsi ?? '-' }}</td>
                            <td>{{ $mp->jenjang ?? '-' }}</td>
                            <td>
                                <a href="/admin/mataPelajaran/{{ $mp->mata_pelajaran_id }}/edit"
                                    class="btn btn-sm btn-outline-primary">Edit</a>

                                <form action="/admin/mataPelajaran/delete/{{ $mp->mata_pelajaran_id }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada mata pelajaran</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
