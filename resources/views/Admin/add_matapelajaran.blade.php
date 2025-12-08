<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
        .navbar { background: linear-gradient(90deg, #a5c9ca, #e7f6f2); }
        .navbar-brand { font-weight: bold; color: #1b4965 !important; }
        .btn-primary { background-color: #62b6cb; border: none; }
        .btn-primary:hover { background-color: #439a86; }
        .card { border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">EduVibe</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="/admin/dashboard" class="nav-link text-dark fw-semibold">Dashboard</a></li>
                <li class="nav-item"><a href="/admin/siswa" class="nav-link text-dark fw-semibold">Siswa</a></li>
                <li class="nav-item"><a href="/admin/mentor" class="nav-link text-dark fw-semibold">Mentor</a></li>
                <li class="nav-item"><a href="/admin/paket" class="nav-link text-dark fw-semibold">Paket</a></li>
                <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="fw-bold text-primary mb-4">Tambah Mata Pelajaran Paket: {{ $paket->nama_paket_pelajaran }}</h2>

    <div class="card p-4">
        <form action="{{ route('admin.mataPelajaran.store') }}" method="POST">
            @csrf
            <input type="hidden" name="paket_id" value="{{ $paket->paket_pelajaran_id }}">

            <div class="mb-3">
                <label class="fw-semibold">Nama Mata Pelajaran</label>
                <input type="text" name="nama_mata_pelajaran" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Jenjang</label>
                <input type="text" name="jenjang" class="form-control" value="{{ $paket->jenjang }}" required>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Mentor</label>
                <select name="mentor_id" class="form-select" required>
                    <option value="">-- Pilih Mentor --</option>
                    @foreach($mentors as $mentor)
                        <option value="{{ $mentor->mentor_id }}">{{ $mentor->nama }} --> {{ $mentor->keahlian }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Tambah Mata Pelajaran</button>
            <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
