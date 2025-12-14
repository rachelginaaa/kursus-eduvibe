<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Materi | EduVibe</title>
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

        .btn-main-blue { background-color: #62b6cb !important; border: none !important; color: white !important; }
        .btn-main-blue:hover { background-color: #439a86 !important; color: white !important; }
        /* Tombol Logout biru */
        .btn-main-blue {
            background-color: #62b6cb !important;
            border: none !important;
            color: white !important;
        }

        .btn-main-blue:hover {
            background-color: #439a86 !important;
            color: white !important;
        }

        .btn-soft-green { background-color: #c7f2c5 !important; border: 1px solid #a8d9a6 !important; color: #2f6b2f !important; }
        .btn-soft-green:hover { background-color: #b0e9ad !important; border-color: #96cf94 !important; color: #245a24 !important; }
        /* Tambah Materi — Soft Green */
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
                <li class="nav-item"><a href="/" class="btn btn-main-blue ms-3">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">EduVibe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/mentor/dashboard" class="nav-link text-dark fw-semibold">Home</a>
                    </li>
                    <li class="nav-item"><a href="/mentor/profile" class="nav-link text-dark fw-semibold">Profil</a>
                    </li>

                    <!-- Logout warna biru -->
                    <li class="nav-item">
                        <a href="/" class="btn btn-main-blue ms-3">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container mt-5">
    <h2 class="fw-bold text-primary mb-4">Kelola Materi: {{ $mata_pelajaran->nama_matapelajaran }}</h2>
    <!-- TITLE -->
    <div class="container mt-5">
        <h2 class="fw-bold text-primary mb-4">Kelola Materi: {{ $mata_pelajaran->nama_matapelajaran }}</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

    <!-- FORM TAMBAH MATERI -->
    <div class="card mb-4 p-4 shadow-sm">
        <h5>Tambah Materi Baru</h5>

        <form action="{{ route('mentor.materi.store', $mata_pelajaran->mata_pelajaran_id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
        <!-- FORM TAMBAH MATERI -->
        <div class="card mb-4 p-4 shadow-sm">
            <h5>Tambah Materi Baru</h5>
            <form action="{{ route('mentor.materi.store', $mata_pelajaran->mata_pelajaran_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judul_materi" class="form-label">Judul Materi</label>
                    <input type="text" name="judul_materi" id="judul_materi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Upload File (opsional)</label>
                    <input type="file" name="file" id="file" class="form-control" accept=".pdf,.docx,.zip">
                </div>

            <button type="submit" class="btn btn-soft-green">Tambah Materi</button>
        </form>
    </div>
                <!-- Tambah Materi soft green -->
                <button type="submit" class="btn btn-soft-green">Tambah Materi</button>
            </form>
        </div>

        <!-- DAFTAR MATERI -->
        <div class="card p-4 shadow-sm">
            <h5>Daftar Materi</h5>

        @if($materi->isEmpty())
            <div class="alert alert-warning">Belum ada materi.</div>
        @else
            <table class="table table-striped table-bordered mt-3">
                <thead class="text-center">
                <tr>
                    <th>ID Materi</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
                </thead>
            @if($materi->isEmpty())
                <div class="alert alert-warning">Belum ada materi.</div>
            @else

                <table class="table table-striped table-bordered mt-3">
                    <thead class="text-center">
                        <tr>
                            <th>ID Materi</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                <tbody>
                @foreach($materi as $m)
                    <tr>
                        <td class="text-center">{{ $m->materi_id }}</td>
                        <td>{{ $m->judul_materi }}</td>
                        <td>{{ $m->deskripsi }}</td>
                        <td class="text-center">
                            @if($m->file)
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($m->file) }}"
                                   target="_blank" class="btn btn-sm btn-info">
                                    Lihat File
                                </a>

                                <a href="{{ \Illuminate\Support\Facades\Storage::url($m->file) }}"
                                   download class="btn btn-sm btn-secondary">
                                    Download
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('mentor.materi.destroy', [$mata_pelajaran->mata_pelajaran_id, $m->materi_id]) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus materi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                    <tbody>
                        @foreach($materi as $m)
                            <tr>
                                <td class="text-center">{{ $m->materi_id }}</td>
                                <td>{{ $m->judul_materi }}</td>
                                <td>{{ $m->deskripsi }}</td>
                                <td class="text-center">
                                    @if($m->file)
                                        <a href="{{ asset('storage/' . $m->file) }}" target="_blank" class="btn btn-sm btn-info">Lihat
                                            File</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form
                                        action="{{ route('mentor.materi.destroy', [$mata_pelajaran->mata_pelajaran_id, $m->materi_id]) }}"
                                        method="POST" onsubmit="return confirm('Yakin hapus materi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

            </table>
        @endif
    </div>
</div>
                </table>

            @endif
        </div>
    </div>

    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Bersama Membangun Generasi Cerdas</p>
    </footer>

</body>

</html>
