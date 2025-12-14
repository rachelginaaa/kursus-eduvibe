<!-- @extends('admin.layout')

@section('content')
    <h2 class="fw-bold mb-4">Kelola Kelas</h2>
    <a href="javascript:history.back()" class="btn btn-secondary mb-3">← Kembali</a>
    <div class="card p-4 shadow-sm">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kelas</th>
                    <th>Level</th>
                    <th>Jumlah Siswa</th>
                </tr>
            </thead>

            <tbody>
                @foreach($kelas as $k)
                    <tr>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>{{ $k->level }}</td>
                        <td>{{ $k->jumlah_siswa ?? '0' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection -->
