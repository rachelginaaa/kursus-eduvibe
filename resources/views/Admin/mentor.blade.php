@extends('admin.layout')

@section('content')

    @if(session('success'))
        <div class="alert alert-success text-center py-3 mb-4"
            style="background:#d4edda; border:none; width:100%; font-size:16px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Kembali</a>
        <h2 class="fw-bold text-primary">Daftar Mentor</h2>
        <a href="{{ route('admin.mentor.create') }}" class="btn btn-primary">+ Tambah Mentor</a>
    </div>

    <form action="{{ route('admin.mentor.index') }}" method="GET" class="row g-2 mb-3">

        <div class="col-md-4">
            <input type="text" name="nama" class="form-control" placeholder="Cari nama mentor..."
                value="{{ request('nama') }}">
        </div>

        <div class="col-md-4">
            <input type="text" name="keahlian" class="form-control" placeholder="Cari berdasarkan keahlian / mapel..."
                value="{{ request('keahlian') }}">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">
                Filter
            </button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('admin.mentor.index') }}" class="btn btn-secondary w-100">
                Reset
            </a>
        </div>

    </form>


    <div class="card p-4 shadow-sm">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mentor</th>
                    <th>Email</th>
                    <th>Keahlian</th>
                    <th>No Hp</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mentor as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->email }}</td>
                        <td>{{ $m->keahlian ?? '-' }}</td>
                        <td>{{ $m->no_hp }}</td>
                        <td>
                            <a href="{{ route('admin.mentor.edit', $m->mentor_id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('admin.mentor.destroy', $m->mentor_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
