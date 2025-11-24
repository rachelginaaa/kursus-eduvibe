<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mentor;
use App\Models\Materi;
use App\Models\PaketPelajaran;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'mata_pelajaran_id';
    public $incrementing = true;

    protected $fillable = [
        'mentor_id',
        'paket_pelajaran_id',
        'nama_matapelajaran',
        'deskripsi',
        'jenjang',
    ];

    // Relasi ke mentor
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'mentor_id');
    }

    // Relasi ke materi
    public function materi()
    {
        return $this->hasMany(MateriPelajaran::class, 'mata_pelajaran_id', 'mata_pelajaran_id');
    }

    // Relasi ke paket pelajaran
    public function paketPelajaran()
    {
        return $this->belongsTo(PaketPelajaran::class, 'paket_pelajaran_id', 'paket_pelajaran_id');
    }
}
