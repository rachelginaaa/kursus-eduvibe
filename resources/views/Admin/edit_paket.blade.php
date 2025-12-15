<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe | Edit Paket Pelajaran</title>
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
        <h2 class="fw-bold text-primary mb-4">Edit Paket Pelajaran</h2>

        <div class="card p-4">
            <form action="/admin/paket/update/{{ $paket->paket_pelajaran_id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="fw-semibold">Nama Paket</label>
                    <input type="text" name="nama_paket_pelajaran" class="form-control"
                        value="{{ $paket->nama_paket_pelajaran }}"
                        oninput="this.value = this.value.replace(/[^a-zA-Z\s-]/g, '')" required>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $paket->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Jenjang</label>
                    <select name="jenjang" class="form-control" required>
                        <option value="">-- Pilih Jenjang --</option>
                        <option value="SD" {{ $paket->jenjang == 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="SMP" {{ $paket->jenjang == 'SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="SMA" {{ $paket->jenjang == 'SMA' ? 'selected' : '' }}>SMA</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="fw-semibold">Harga</label>
                    <input type="text" name="harga" class="form-control" value="{{ $paket->harga }}"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '')" required>
                </div>

                <button class="btn btn-primary">Simpan Perubahan</button>
                <a href="/admin/paket" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</body>

</html>
