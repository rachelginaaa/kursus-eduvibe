<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EduVibe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e7f6f2, #a5c9ca);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
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
        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="container d-flex align-items-center justify-content-center h-100">
        <div class="col-md-5">
            <div class="text-center mb-4">
                <div class="logo">EduVibe</div>
                <p class="text-secondary">Masuk ke akun Anda</p>
            </div>

            @if ($errors->has('loginError'))
                <div class="alert alert-danger text-center">
                    {{ $errors->first('loginError') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="contoh: siswa@eduvibe.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-2">Masuk Sekarang</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <small class="text-muted">Belum punya akun? <a href="/register" class="text-decoration-none text-primary">Daftar</a></small>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
