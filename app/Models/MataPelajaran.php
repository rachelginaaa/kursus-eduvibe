<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mentor;
use App\Models\Siswa;
use App\Models\Materi;


class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'mata_pelajaran_id';
    public $incrementing = true;

    protected $fillable = [
        'mentor_id',
        'siswa_id',
        'nama_matapelajaran',
        'paket_pelajaran_id',
        'deskripsi',
        'jenjang',
    ];

    // Relasi ke mentor
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'mentor_id');
    }

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'siswa_id');
    }

    // Relasi ke materi
    public function materi()
    {
        return $this->hasMany(Materi::class, 'mata_pelajaran_id', 'mata_pelajaran_id');
    }
        public function paketPelajaran()
    {
        return $this->belongsTo(PaketPelajaran::class, 'paket_pelajaran_id', 'paket_pelajaran_id');
    }
}
