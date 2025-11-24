@extends('admin.layout')

@section('content')
<h2 class="fw-bold mb-4">Kelola Siswa</h2>
<a href="javascript:history.back()" class="btn btn-secondary mb-3">← Kembali</a>

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
