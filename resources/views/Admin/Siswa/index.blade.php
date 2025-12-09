@extends('admin.layout')

@section('title', 'Daftar Siswa')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Daftar Siswa</h2>
            <a href="/admin/dashboard" class="btn btn-secondary mb-3">← Kembali</a>
        </div>

    <!-- Tombol Tambah Siswa -->
    <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

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
                    <form action="{{ route('admin.siswa.delete', $s->siswa_id) }}"
                          method="POST"
                          style="display:inline-block;"
                          onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
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
