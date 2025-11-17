<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_admin',
        'username',
        'password',
        'email',
    ];

    protected $hidden = [
        'password',
    ];
}
