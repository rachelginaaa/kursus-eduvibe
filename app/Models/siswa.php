<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa';
    protected $primaryKey = 'siswaid';
    public $timestamps = true;

    protected $fillable = [
        'nama', 'email', 'password', 'jenjang', 'jenis_kelamin', 'no_hp', 'tgl_daftar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
