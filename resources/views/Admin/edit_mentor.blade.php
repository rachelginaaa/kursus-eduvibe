@extends('admin.layout')

@section('content')
    <h2 class="fw-bold mb-4">Edit Mentor</h2>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('admin.mentor.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('admin.mentor.update', $mentor->mentor_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Mentor</label>
                <input type="text" name="nama" class="form-control" value="{{ $mentor->nama }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $mentor->email }}" required>
            </div>

            <div class="mb-3">
                <label>Password (Opsional)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>Keahlian</label>
                <input type="text" name="keahlian" class="form-control" value="{{ $mentor->keahlian }}">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $mentor->no_hp }}" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="aktif" {{ $mentor->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $mentor->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <button class="btn btn-warning">Update Mentor</button>
        </form>
    </div>
@endsection