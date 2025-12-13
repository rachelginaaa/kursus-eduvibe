<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="fw-bold text-primary mb-4">Edit Mata Pelajaran Paket: {{ $paket->nama_paket_pelajaran }}</h2>

        <div class="card p-4">
            <form action="/admin/mataPelajaran/update/{{ $mataPelajaran->mata_pelajaran_id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="fw-semibold">Nama Mata Pelajaran</label>
                    <input type="text" name="nama_matapelajaran" class="form-control"
                        value="{{ $mataPelajaran->nama_matapelajaran }}"
                        oninput="this.value = this.value.replace(/[^a-zA-Z\s-]/g, '')" required>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $mataPelajaran->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Jenjang</label>
                    <input type="text" name="jenjang" class="form-control" value="{{ $mataPelajaran->jenjang }}"
                        readonly>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Mentor</label>
                    <select name="mentor_id" class="form-select" required>
                        @foreach($mentors as $mentor)
                            <option value="{{ $mentor->mentor_id }}" {{ $mentor->mentor_id == $mataPelajaran->mentor_id ? 'selected' : '' }}>
                                {{ $mentor->nama }}-->{{ $mentor->keahlian }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary">Simpan Perubahan</button>
                <a href="/admin/paket/index/{{ $paket->paket_pelajaran_id }}" class="btn btn-secondary">← Kembali</a>
            </form>
        </div>
    </div>

</body>

</html>
