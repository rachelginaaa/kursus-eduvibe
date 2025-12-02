<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriPelajaran extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'materi_id';
    public $incrementing = true;

    protected $fillable = [
        'mata_pelajaran_id',
        'pengampu',
        'judul_materi',
        'deskripsi',
        'file',
        'tgl_upload',
        'jenjang',
    ];

    // Relasi ke MataPelajaran
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }
}
