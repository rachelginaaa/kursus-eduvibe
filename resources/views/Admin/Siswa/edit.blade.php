@extends('admin.layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Siswa</h2>
        <form action="{{ route('admin.siswa.update', $siswa->siswa_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $siswa->email }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="jenjang">Jenjang</label>
                <select name="jenjang" id="jenjang" class="form-control" required>
                    <option value="SD" {{ $siswa->jenjang == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ $siswa->jenjang == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ $siswa->jenjang == 'SMA' ? 'selected' : '' }}>SMA</option>
                </select>
            </div>


            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $siswa->no_hp }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Siswa</button>
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection