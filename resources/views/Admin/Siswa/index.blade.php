@extends('admin.layout')

@section('title', 'Daftar Siswa')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Daftar Siswa</h2>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-success">+ Tambah Siswa</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenjang</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswa as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->jenjang }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_hp }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data siswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
