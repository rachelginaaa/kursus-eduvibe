<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriPelajaran extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'materi_id';
    public $incrementing = true;

    protected $fillable = [
        'matapelajaran_id',
        'pengampu',
        'judul_materi',
        'deskripsi',
        'file',
        'tgl_upload',
        'jenjang',
    ];
    public function materi()
    {
        return $this->hasMany(MateriPelajaran::class, 'mata_pelajaran_id')->orderBy('urutan');
    }

}
