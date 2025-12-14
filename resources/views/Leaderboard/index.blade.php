<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVibe | Leaderboard</title>

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
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">EduVibe</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/home" class="nav-link fw-semibold">Home</a></li>
                    <li class="nav-item"><a href="/profile" class="nav-link fw-semibold">Profil</a></li>
                    <li class="nav-item"><a href="/leaderboard" class="nav-link fw-semibold">Leaderboard</a></li>
                    <li class="nav-item"><a href="/" class="btn btn-primary ms-3">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
        <h2 class="text-center fw-bold text-primary mb-4">
            🏆 Leaderboard Siswa
        </h2>

        <div class="d-flex justify-content-center mb-4">
            <form method="GET" action="{{ route('leaderboard') }}" class="d-flex gap-2">
                <select name="jenjang" class="form-select">
                    <option value="">Semua Jenjang</option>
                    <option value="SD" {{ request('jenjang') == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ request('jenjang') == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ request('jenjang') == 'SMA' ? 'selected' : '' }}>SMA</option>
                </select>
                <button class="btn btn-primary">Filter</button>
            </form>
        </div>

        <div class="card p-4">
            <table class="table table-striped text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Peringkat</th>
                        <th>Nama Siswa</th>
                        <th>Jenjang</th>
                        <th>Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaderboard as $index => $row)
                        <tr>
                            <td>
                                @if($index == 0) 🥇
                                @elseif($index == 1) 🥈
                                @elseif($index == 2) 🥉
                                @else {{ $index + 1 }}
                                @endif
                            </td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->jenjang }}</td>
                            <td class="fw-bold text-success">{{ $row->total_poin }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Belum ada data leaderboard</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-secondary mt-5 mb-3">
        <p>&copy; 2025 EduVibe - Belajar Tanpa Batas</p>
    </footer>

</body>

</html>
