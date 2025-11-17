<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $table = 'mentor'; 
    protected $primaryKey = 'mentor_id'; 

    protected $fillable = [
        'nama',
        'password',
        'email',
        'keahlian',
        'no_hp',
    ];

    // Relasi ke mata pelajaran
    public function mataPelajarans()
    {
        return $this->hasMany(MataPelajaran::class, 'mentor_id', 'mentor_id');
    }
}
