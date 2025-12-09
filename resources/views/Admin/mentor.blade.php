@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Daftar Mentor</h2>
            <a href="/admin/dashboard" class="btn btn-secondary mb-3">← Kembali</a>
        </div>
<div class="card p-4 shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mentor</th>
                <th>Email</th>
                <th>Keahlian</th>
                <th>No Hp</th>
            </tr>
        </thead>

        <tbody>
            @foreach($mentor as $m)
                <tr>
                    <td>{{ $m->mentor_id }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->keahlian ?? '-' }}</td>
                    <td>{{ $m->no_hp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
