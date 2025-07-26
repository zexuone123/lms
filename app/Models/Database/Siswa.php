<?php

namespace App\Models\Database;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    protected $table = 'siswa';

    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'class',
    ];
}
