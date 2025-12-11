<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Soal | EduVibe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color:#f8f9fa; font-family:'Poppins',sans-serif; }
    .navbar { background: linear-gradient(90deg, #a5c9ca, #e7f6f2); }
    .navbar-brand { font-weight:bold; color:#1b4965 !important; }
    .card { border:none; border-radius:16px; box-shadow:0 4px 12px rgba(0,0,0,.08); }
    .btn-primary { background-color:#62b6cb; border:none; }
    .btn-primary:hover { background-color:#439a86; }
    footer { background-color:#e7f6f2; padding:20px; margin-top:50px; }
  </style>
</head>

<body class="bg-light">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/mentor/home">EduVibe</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="/mentor/dashboard" class="nav-link text-dark fw-semibold">Home</a></li>
          <li class="nav-item"><a href="/mentor/profile" class="nav-link text-dark fw-semibold">Profil</a></li>
          <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CONTENT -->
  <div class="container mt-5">

    <a href="{{ route('mentor.kuis.index', $kuis->mata_pelajaran_id) }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card p-4 mb-4">
      <h4 class="mb-1">{{ $kuis->nama_kuis ?? 'Kuis' }}</h4>
      <div class="text-muted">
        Mapel: {{ $kuis->nama_matapelajaran ?? '-' }} • Materi: {{ $kuis->judul_materi ?? '-' }}
      </div>

      @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
      @endif
      @if($errors->any())
        <div class="alert alert-danger mt-3">
          <ul class="mb-0">
            @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
          </ul>
        </div>
      @endif
    </div>

    <!-- FORM TAMBAH -->
    <div class="card p-4 mb-4">
      <h5 class="mb-3">Tambah Soal</h5>

      <form method="POST" action="{{ route('mentor.kuis.soal.store', $kuis->kuis_id) }}">
        @csrf
        <div class="mb-3">
          <label class="form-label fw-semibold">Pertanyaan</label>
          <textarea class="form-control" name="pertanyaan" rows="3" required>{{ old('pertanyaan') }}</textarea>
        </div>

        <div class="row">
          @for($i=1; $i<=4; $i++)
          <div class="col-md-6 mb-3">
            <label class="form-label">Opsi {{ $i }}</label>
            <input class="form-control" name="opsi_jawaban_{{ $i }}" value="{{ old('opsi_jawaban_'.$i) }}" required>
          </div>
          @endfor
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Jawaban Benar</label>
          <select class="form-select" name="jawaban_benar" required>
            <option value="">-- pilih --</option>
            <option value="1" {{ old('jawaban_benar')=='1'?'selected':'' }}>Opsi 1</option>
            <option value="2" {{ old('jawaban_benar')=='2'?'selected':'' }}>Opsi 2</option>
            <option value="3" {{ old('jawaban_benar')=='3'?'selected':'' }}>Opsi 3</option>
            <option value="4" {{ old('jawaban_benar')=='4'?'selected':'' }}>Opsi 4</option>
          </select>
        </div>

        <button class="btn btn-primary">Simpan Soal</button>
      </form>
    </div>

    <!-- DAFTAR SOAL -->
    <div class="card p-4">
      <h5 class="mb-3">Daftar Soal</h5>

      @if($soal->isEmpty())
        <div class="text-muted">Belum ada soal.</div>
      @else
        <ol class="mb-0">
          @foreach($soal as $s)
            <li class="mb-4">
              <div class="fw-semibold">{{ $s->soal }}</div>
              <div class="small">
                1) {{ $s->opsi1 }}<br>
                2) {{ $s->opsi2 }}<br>
                3) {{ $s->opsi3 }}<br>
                4) {{ $s->opsi4 }}<br>
                <span class="text-success">Kunci: Opsi {{ $s->jawaban_benar }}</span>
              </div>

              <div class="mt-2">
                <!-- Tombol Edit (buka modal) -->
                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editSoal{{ $s->soal_id }}">
                  Edit
                </button>

                <!-- Tombol Hapus -->
                <form action="{{ route('mentor.kuis.soal.destroy', [$kuis->kuis_id, $s->soal_id]) }}"
                      method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin ingin menghapus soal ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </div>
            </li>

            <!-- MODAL EDIT SOAL -->
            <div class="modal fade" id="editSoal{{ $s->soal_id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <form method="POST" action="{{ route('mentor.kuis.soal.update', [$kuis->kuis_id, $s->soal_id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                      <h5 class="modal-title">Edit Soal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label fw-semibold">Pertanyaan</label>
                        <textarea class="form-control" name="pertanyaan" rows="3" required>{{ $s->soal }}</textarea>
                      </div>

                      @for($i=1; $i<=4; $i++)
                      <div class="mb-2">
                        <label class="form-label">Opsi {{ $i }}</label>
                        <input type="text" class="form-control" name="opsi_jawaban_{{ $i }}" value="{{ $s->{'opsi'.$i} }}" required>
                      </div>
                      @endfor

                      <div class="mb-3 mt-3">
                        <label class="form-label fw-semibold">Jawaban Benar</label>
                        <select class="form-select" name="jawaban_benar" required>
                          @for($i=1; $i<=4; $i++)
                            <option value="{{ $i }}" {{ $s->jawaban_benar == $i ? 'selected' : '' }}>Opsi {{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </ol>
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
