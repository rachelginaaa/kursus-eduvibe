<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mapel->nama_matapelajaran }} | EduVibe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
        .navbar { background: linear-gradient(90deg, #a5c9ca, #e7f6f2); }
        .navbar-brand { font-weight: bold; color: #1b4965 !important; }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            padding: 30px;
        }

        .btn-primary { background-color: #62b6cb; border: none; }
        .btn-primary:hover { background-color: #439a86; }

        footer { background-color: #e7f6f2; padding: 20px; margin-top: 50px; }

        .back-btn { margin-bottom: 20px; }

        h2 { color: #1b4965; font-weight: bold; }

        .materi-card {
            background: #ffffff;
            border: 2px solid #e3f2fd;
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .materi-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }

        .materi-title { color: #1b4965; font-weight: 600; }
        .section-title { color: #1b4965; font-weight: 700; }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('siswa.home') }}">EduVibe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('siswa.home') }}" class="nav-link text-dark fw-semibold">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class="nav-link text-dark fw-semibold">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="btn btn-primary ms-3">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Detail Mata Pelajaran -->
    <div class="container mt-5">

        <a href="{{ route('siswa.home') }}" class="btn btn-secondary back-btn">← Kembali ke Home</a>

        <div class="card text-center">
            <h2>{{ $mapel->nama_matapelajaran }}</h2>
            <p class="text-muted mt-3">{{ $mapel->deskripsi }}</p>

            <p class="fw-semibold mt-3">
                Mentor: {{ $mapel->mentor->nama ?? 'Belum ada mentor' }}
            </p>

            {{-- ===================== MATERI ===================== --}}
            <div class="mt-5">
                <h4 class="section-title mb-3">Daftar Materi</h4>

                @if($mapel->materi->count() > 0)
                    <div class="row justify-content-center">
                        @foreach($mapel->materi as $materi)
                            <div class="col-md-4 mb-4">
                                <div class="materi-card p-3 h-100">

                                    <h5 class="text-center materi-title">{{ $materi->judul_materi }}</h5>

                                    <p class="text-muted" style="font-size: 14px;">
                                        {{ \Illuminate\Support\Str::limit($materi->deskripsi, 120) }}
                                    </p>

                                    <p class="text-end mb-2">
                                        <small class="text-secondary">{{ $materi->tgl_upload }}</small>
                                    </p>

                                    @if($materi->file)
                                        {{-- FIX: pakai Storage::url() --}}
                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($materi->file) }}"
                                           target="_blank"
                                           class="btn btn-primary w-100">
                                            Lihat File
                                        </a>

                                        {{-- Optional: tombol download --}}
                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($materi->file) }}"
                                           download
                                           class="btn btn-outline-primary w-100 mt-2">
                                            Download File
                                        </a>
                                    @else
                                        <button class="btn btn-secondary w-100" disabled>
                                            Tidak ada file
                                        </button>
                                    @endif

                                    <a href="{{ route('materi.show', $materi->materi_id) }}"
                                       class="btn btn-outline-primary w-100 mt-2">
                                        Lihat Materi
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Belum ada materi untuk mata pelajaran ini.</p>
                @endif
            </div>

            {{-- ===================== KUIS ===================== --}}
            <div class="mt-5">
                <h4 class="section-title mb-3">Daftar Kuis</h4>

                @if(session('error'))
                    <div class="alert alert-warning text-start">{{ session('error') }}</div>
                @endif

                @if(empty($kuis) || $kuis->isEmpty())
                    <p class="text-muted">Belum ada kuis untuk mata pelajaran ini.</p>
                @else
                    <div class="row justify-content-center">
                        @foreach($kuis as $k)
                            <div class="col-md-4 mb-4">
                                <div class="materi-card p-3 h-100">

                                    <h5 class="text-center materi-title">{{ $k->nama_kuis }}</h5>

                                    <p class="text-muted" style="font-size: 14px;">
                                        {{ \Illuminate\Support\Str::limit($k->deskripsi ?? 'Kerjakan kuis untuk menguji pemahaman materi.', 120) }}
                                    </p>

                                    <p class="text-end mb-2">
                                        <small class="text-secondary">
                                            Materi: {{ $k->judul_materi ?? '-' }}
                                        </small>
                                    </p>

                                    @if(!is_null($k->nilai_saya))
                                        <div class="alert alert-success py-2 mb-2 text-start" style="font-size:14px;">
                                            Nilai saya: <b>{{ $k->nilai_saya }}</b>
                                        </div>
                                    @else
                                        <div class="text-muted mb-2" style="font-size:14px;">
                                            Belum dikerjakan
                                        </div>
                                    @endif

                                    <a href="{{ route('siswa.kuis.step', [$k->kuis_id, 1]) }}" class="btn btn-primary w-100">
                                        Kerjakan Kuis
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-secondary">
        <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
