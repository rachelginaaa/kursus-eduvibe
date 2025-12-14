<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kuis | EduVibe</title>
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
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
        }

        .btn-primary {
            background-color: #62b6cb;
            border: none;
        }

        .btn-primary:hover {
            background-color: #439a86;
        }

        footer {
            background-color: #e7f6f2;
            padding: 20px;
            margin-top: 50px;
        }
    </style>
</head>

<body class="bg-light">

    <!-- NAVBAR / HEADER (MENTOR) -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/mentor/home">EduVibe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="nav" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/mentor/dashboard" class="nav-link text-dark fw-semibold">Home</a>
                    </li>
                    <li class="nav-item"><a href="/mentor/profile" class="nav-link text-dark fw-semibold">Profil</a>
                    </li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-5">

        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">← Kembali</a>

        <div class="card p-4 mb-4">
            <h3 class="mb-2">Kelola Kuis: {{ $mapel->nama_matapelajaran }}</h3>
            <div class="text-muted mb-3">Buat kuis, lalu tambahkan soal.</div>

            @if(session('success'))
                <div class="alert alert-success mb-3">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul class="mb-0">
                        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                    </ul>
                </div>
            @endif

            @if($materi->isEmpty())
                <div class="alert alert-warning mb-0">
                    Materi untuk mapel ini belum ada. Buat materi dulu sebelum membuat kuis.
                </div>
            @else
                <form method="POST" action="{{ route('mentor.kuis.store', $mapel->mata_pelajaran_id) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Materi</label>
                        <select class="form-select" name="materi_id" required>
                            <option value="">-- pilih materi --</option>
                            @foreach($materi as $m)
                                @php
                                    $judulMateri = $m->judul_materi ?? $m->judul ?? $m->nama_materi ?? ('Materi #' . $m->materi_id);
                                @endphp
                                <option value="{{ $m->materi_id }}" {{ (string) old('materi_id') === (string) $m->materi_id ? 'selected' : '' }}>
                                    {{ $judulMateri }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Kuis</label>
                        <input type="text" class="form-control" name="nama_kuis" value="{{ old('nama_kuis') }}"
                            placeholder="Contoh: Kuis Fisika 1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi (opsional)</label>
                        <textarea class="form-control" name="deskripsi" rows="3"
                            placeholder="Contoh: Kerjakan kuis setelah membaca materi...">{{ old('deskripsi') }}</textarea>
                    </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi (opsional)</label>
            <textarea class="form-control" name="deskripsi" rows="3" placeholder="Contoh: Kerjakan kuis setelah membaca materi...">{{ old('deskripsi') }}</textarea>
          </div>

          {{-- DURASI TIMER --}}
          <div class="mb-3">
            <label class="form-label fw-semibold">Durasi Kuis (menit)</label>
            <input
              type="number"
              class="form-control"
              name="durasi_menit"
              min="1"
              value="{{ old('durasi_menit', 10) }}"
              required
            >
            <div class="form-text">Contoh: 10 = 10 menit untuk menyelesaikan kuis.</div>
          </div>

                    <button class="btn btn-primary">Buat Kuis</button>
                </form>
            @endif
        </div>

        <div class="card p-4">
            <h5 class="mb-3">Daftar Kuis</h5>

            @if($kuis->isEmpty())
                <div class="text-muted">Belum ada kuis untuk mapel ini.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-info">
                            <tr>
                                <th style="width:80px">ID</th>
                                <th>Nama Kuis</th>
                                <th>Materi</th>
                                <th>Deskripsi</th>
                                <th style="width:240px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kuis as $k)
                                @php
                                    $judulMateriKuis = $k->judul_materi ?? $k->judul ?? $k->nama_materi ?? '-';
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $k->kuis_id }}</td>
                                    <td>{{ $k->nama_kuis }}</td>
                                    <td>{{ $judulMateriKuis }}</td>
                                    <td>{{ $k->deskripsi ?? '-' }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center flex-wrap gap-1">
                                            {{-- Kelola Soal --}}
                                            <a href="{{ route('mentor.kuis.soal', $k->kuis_id) }}"
                                                class="btn btn-sm btn-success">Soal</a>
      @if($kuis->isEmpty())
        <div class="text-muted">Belum ada kuis untuk mapel ini.</div>
      @else
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-info">
              <tr>
                <th style="width:80px">ID</th>
                <th>Nama Kuis</th>
                <th>Materi</th>
                <th>Deskripsi</th>
                <th style="width:110px">Durasi</th>
                <th style="width:240px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($kuis as $k)
                @php
                  $judulMateriKuis = $k->judul_materi ?? $k->judul ?? $k->nama_materi ?? '-';
                @endphp
                <tr>
                  <td class="text-center">{{ $k->kuis_id }}</td>
                  <td>{{ $k->nama_kuis }}</td>
                  <td>{{ $judulMateriKuis }}</td>
                  <td>{{ $k->deskripsi ?? '-' }}</td>
                  <td class="text-center">
                    {{ $k->durasi_menit ?? 10 }} menit
                  </td>
                  <td class="text-center">
                    <div class="d-flex justify-content-center flex-wrap gap-1">
                      {{-- Kelola Soal --}}
                      <a href="{{ route('mentor.kuis.soal', $k->kuis_id) }}" class="btn btn-sm btn-success">Soal</a>

                                            {{-- Edit (modal) --}}
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editKuis{{ $k->kuis_id }}">Edit</button>

                                            {{-- Hapus --}}
                                            <form action="{{ route('mentor.kuis.destroy', $k->kuis_id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kuis ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>

                                        {{-- MODAL EDIT --}}
                                        <div class="modal fade" id="editKuis{{ $k->kuis_id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ route('mentor.kuis.update', $k->kuis_id) }}">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Kuis: {{ $k->nama_kuis }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Pilih Materi</label>
                                                                <select class="form-select" name="materi_id" required>
                                                                    <option value="">-- pilih materi --</option>
                                                                    @foreach($materi as $m)
                                                                        @php
                                                                            $judulMateri = $m->judul_materi ?? $m->judul ?? $m->nama_materi ?? ('Materi #' . $m->materi_id);
                                                                        @endphp
                                                                        <option value="{{ $m->materi_id }}" {{ (string) $m->materi_id === (string) $k->materi_id ? 'selected' : '' }}>
                                                                            {{ $judulMateri }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Nama Kuis</label>
                                                                <input type="text" class="form-control" name="nama_kuis"
                                                                    value="{{ $k->nama_kuis }}" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Deskripsi
                                                                    (opsional)</label>
                                                                <textarea class="form-control" name="deskripsi"
                                                                    rows="3">{{ $k->deskripsi }}</textarea>
                                                            </div>
                                                        </div>
                              <div class="mb-3">
                                <label class="form-label fw-semibold">Deskripsi (opsional)</label>
                                <textarea class="form-control" name="deskripsi" rows="3">{{ $k->deskripsi }}</textarea>
                              </div>

                              {{-- DURASI TIMER (EDIT) --}}
                              <div class="mb-3">
                                <label class="form-label fw-semibold">Durasi Kuis (menit)</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  name="durasi_menit"
                                  min="1"
                                  value="{{ $k->durasi_menit ?? 10 }}"
                                  required
                                >
                              </div>
                            </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- END MODAL --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>

    <!-- FOOTER -->
    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Bersama Membangun Generasi Cerdas</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
