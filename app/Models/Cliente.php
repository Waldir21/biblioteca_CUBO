<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre', 'apellido', 'edad', 'telefono', 'direccion', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
