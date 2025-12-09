@extends('layouts.admin')

@section('title', 'Kelola Siswa')

@section('content')
<div class="container mt-5">
    <h1 class="fw-bold text-primary mb-4" style="color:#1b4965;">Kelola Siswa</h1>

    <a href="{{ route('admin.siswa.create') }}" class="btn mb-3"
       style="background-color:#62b6cb; color:white; border:none;">+ Tambah Siswa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-3 shadow-sm" style="border-radius:20px;">
        <table class="table table-striped table-hover">
            <thead style="background-color:#a5c9ca; color:#1b4965;">
                <tr>
                    <th>#</th>
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
                        <a href="{{ route('admin.siswa.edit', $s->siswa_id) }}"
                           class="btn btn-sm" style="background-color:#62b6cb; color:white; border:none;">Edit</a>

                        <form action="{{ route('admin.siswa.delete', $s->siswa_id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus siswa ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" style="background-color:#f94144; color:white; border:none;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada siswa terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
