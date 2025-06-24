<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros'; // importante: singular, como en tu SQL
    protected $primaryKey = 'id_libro';
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descripcion',
        'categoria',
        'autor',
        'fecha_publicacion',
        'tipo_libro',
        'id_usuario',
    ];

    public function pdf()
{
    return $this->hasOne(LibroPdf::class, 'id_libro', 'id_libro');
}

}
