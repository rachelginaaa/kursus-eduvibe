@extends('admin.layout')

@section('title', 'Daftar Siswa')

@section('content')
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Kembali</a>
            <h2 class="fw-bold text-primary">Daftar Siswa</h2>
            <a href="{{ route('admin.mentor.create') }}" class="btn btn-primary">+ Tambah Siswa</a>
        </div>

        <form method="GET" action="{{ route('admin.siswa.index') }}" class="row g-2 mb-4">

            <div class="col-md-4">
                <input type="text" name="nama" class="form-control" placeholder="Cari nama siswa..."
                    value="{{ request('nama') }}">
            </div>

            <div class="col-md-3">
                <select name="jenjang" class="form-control">
                    <option value="">-- Semua Jenjang --</option>
                    <option value="SD" {{ request('jenjang') == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ request('jenjang') == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ request('jenjang') == 'SMA' ? 'selected' : '' }}>SMA</option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">Filter</button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>

        </form>

        <!-- Tabel Daftar Siswa -->
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenjang</th>
                    <th>Jenis Kelamin</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswa as $index => $s)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->email }}</td>
                        <td>{{ $s->jenjang }}</td>
                        <td>{{ $s->jenis_kelamin }}</td>
                        <td>{{ $s->no_hp }}</td>
                        <td>

                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.siswa.edit', $s->siswa_id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('admin.siswa.delete', $s->siswa_id) }}" method="POST"
                                style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection