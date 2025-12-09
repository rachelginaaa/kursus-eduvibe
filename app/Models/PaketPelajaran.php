<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketPelajaran extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'paket_pelajaran';

    // Primary key custom
    protected $primaryKey = 'paket_pelajaran_id';

    // Field yang bisa diisi lewat mass assignment
    protected $fillable = [
        'siswa_id',
        'nama_paket_pelajaran',
        'deskripsi',
        'jenjang',
        'harga',
    ];

    /**
     * Relasi ke Siswa (Many to One)
     * 1 siswa bisa punya banyak paket
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'siswa_id');
    }

    /**
     * Relasi ke Mata Pelajaran (One to Many)
     * 1 paket punya banyak mata pelajaran
     */
    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'paket_pelajaran_id', 'paket_pelajaran_id');
    }
}
