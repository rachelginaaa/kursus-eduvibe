<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mentor extends Authenticatable
{
    use HasFactory;

    protected $table = 'mentor';
    protected $primaryKey = 'mentor_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'keahlian',
        'no_hp',
        'role', // ← DITAMBAHKAN
    ];

    protected $hidden = [
        'password',
    ];

    // Jika nanti pakai multi-auth
    protected $guard = 'mentor'; // ← DITAMBAHKAN (tidak wajib tapi aman)

    public function mataPelajarans()
    {
        return $this->hasMany(MataPelajaran::class, 'mentor_id', 'mentor_id');
    }

    // Relasi tambahan (tidak merusak, hanya membantu)
    public function paketPelajarans()
    {
        return $this->hasMany(PaketPelajaran::class, 'mentor_id', 'mentor_id');
    }
}
