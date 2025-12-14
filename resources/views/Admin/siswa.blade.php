@extends('admin.layout')

@section('content')
    <h2 class="fw-bold mb-4">Kelola Siswa</h2>
    <a href="javascript:history.back()" class="btn btn-secondary mb-3">← Kembali</a>

    <form action="{{ route('admin.siswa.index') }}" method="GET" class="row g-2 mb-3">

        <div class="col-md-3">
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
        
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary w-100">Cari</button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary w-100">
                Reset
            </a>
        </div>

    </form>


    <div class="card p-4 shadow-sm">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <!-- <th>Password</th> -->
                    <th>Tanggal Daftar</th>
                    <th>Jenjang</th>
                    <th>Jenis Kelamin</th>
                    <th>No Hp</th>
                </tr>
            </thead>

            <tbody>
                @foreach($siswa as $s)
                    <tr>
                        <td>{{ $s->siswa_id }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->email }}</td>
                        <!-- <td>{{ $s->password }}</td> -->
                        <td>{{ $s->tgl_daftar }}</td>
                        <td>{{ $s->jenjang }}</td>
                        <td>{{ $s->jenis_kelamin }}</td>
                        <td>{{ $s->no_hp }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
