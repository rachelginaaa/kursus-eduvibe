<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Siswa extends Authenticatable
{
    protected $table = 'siswa';
    protected $fillable = ['nama', 'email', 'password', 'jenjang', 'jenis_kelamin', 'no_hp', 'tgl_daftar'];
    protected $hidden = ['password'];
}



