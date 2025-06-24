<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibroPdf extends Model
{
    protected $table = 'libro_pdfs';

    protected $fillable = ['id_libro', 'url_pdf'];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_libro', 'id_libro');
    }
}
