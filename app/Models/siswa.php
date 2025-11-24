<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa';
<<<<<<< HEAD
    protected $primaryKey = 'siswaid';
=======
    protected $primaryKey = 'siswa_id';
>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
    public $timestamps = true;

    protected $fillable = [
        'nama', 'email', 'password', 'jenjang', 'jenis_kelamin', 'no_hp', 'tgl_daftar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
<<<<<<< HEAD
=======
    public function paketPelajaran()
    {
        return $this->hasMany(PaketPelajaran::class, 'siswa_id', 'siswa_id');
    }

>>>>>>> 59e06d7876bf11aebd24c69e67c75f8c1dd96929
}
