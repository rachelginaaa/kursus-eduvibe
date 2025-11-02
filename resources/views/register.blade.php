<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | EduVibe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e7f6f2, #a5c9ca);
            font-family: 'Poppins', sans-serif;
            height: 100%;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 25px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            padding: 30px;
            background-color: #fff;
        }
        .btn-primary {
            background-color: #62b6cb;
            border: none;
            border-radius: 10px;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #439a86;
        }
        .form-control {
            border-radius: 10px;
        }
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #1b4965;
        }
    </style>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center py-5">
    <div class="col-md-7">
        <div class="text-center mb-4">
            <div class="logo">EduVibe</div>
            <p class="text-secondary">Daftar akun siswa baru</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Konfirmasi Sandi</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi kata sandi" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenjang</label>
                        <select name="jenjang" class="form-select" required>
                            <option value="">-- Pilih Jenjang --</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="Contoh: 081234567890" required>
                    </div>
                </div>

                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary py-2">Daftar Sekarang</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <small class="text-muted">Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-decoration-none text-primary">Login di sini</a>
                </small>
            </div>
        </div>
    </div>
</div>

</body>
</html>
