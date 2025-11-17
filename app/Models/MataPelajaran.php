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

    protected $fillable = [
        'mentor_id',
        'siswa_id',
        'nama_matapelajaran',
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
}
