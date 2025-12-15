<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe | Tambah Paket Pelajaran</title>
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

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
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
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link text-dark fw-semibold">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/siswa" class="nav-link text-dark fw-semibold">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/mentor" class="nav-link text-dark fw-semibold">Mentor</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/paket" class="nav-link text-dark fw-semibold">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="btn btn-primary ms-3">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-5">
        <h2 class="fw-bold text-primary mb-4">Tambah Paket Pelajaran</h2>

        <div class="card p-4">
            <form action="{{ route('admin.paket.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="fw-semibold">Nama Paket</label>
                    <input type="text" name="nama_paket_pelajaran" class="form-control"
                        oninput="this.value = this.value.replace(/[^a-zA-Z\s-]/g, '')" required>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Jenjang</label>
                    <select name="jenjang" class="form-control" required>
                        <option value="">-- Pilih Jenjang --</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Harga</label>
                    <input type="text" name="harga" class="form-control"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                </div>

                <button class="btn btn-primary">Tambah Paket</button>
                <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</body>

</html>
