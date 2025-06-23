<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroClienteController extends Controller
{
   public function index(Request $request)
{
    $categoriaSeleccionada = $request->input('categoria');

    $categorias = Libro::select('categoria')
        ->distinct()
        ->get()
        ->map(function ($cat) {
            $cat->count = Libro::where('categoria', $cat->categoria)->count();
            return $cat;
        });

    $libros = Libro::when($categoriaSeleccionada, function ($query, $categoria) {
            return $query->where('categoria', $categoria);
        })
        ->paginate(6);

    return view('cliente.libros', compact('categorias', 'libros', 'categoriaSeleccionada'));
}

}
