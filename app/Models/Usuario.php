<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario'; // nombre exacto de tu tabla

    protected $primaryKey = 'id_usuario'; // clave primaria custom

    public $timestamps = false; // si tu tabla no tiene created_at/updated_at

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'cargo',
        'dui',
        'direccion',
        'email',
        'password',
        'activo',
    ];

    protected $hidden = [
        'password',
    ];
}
