<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="fw-bold text-primary mb-4">Tambah Paket Pelajaran</h2>

    <div class="card p-4">

        <form action="{{ route('admin.paket.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="fw-semibold">Nama Paket</label>
                <input type="text" name="nama_paket_pelajaran" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Jenjang</label>
                <input type="text" name="jenjang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>

            <button class="btn btn-primary">Tambah Paket</button>
            <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
</div>

</body>
</html>

