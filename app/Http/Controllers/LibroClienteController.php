<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroClienteController extends Controller
{
    public function index(Request $request)
    {
        $categoriaSeleccionada = $request->input('categoria');

        // Obtener categorías únicas con el conteo de libros por categoría
        $categorias = Libro::select('categoria')
            ->distinct()
            ->get()
            ->map(function ($cat) {
                $cat->count = Libro::where('categoria', $cat->categoria)->count();
                return $cat;
            });

        // Obtener libros con relación al PDF y filtro por categoría si aplica
        $libros = Libro::with('pdf')
            ->when($categoriaSeleccionada, function ($query, $categoria) {
                return $query->where('categoria', $categoria);
            })
            ->paginate(6);

        // Retornar vista con datos
        return view('cliente.libros', compact('categorias', 'libros', 'categoriaSeleccionada'));
    }
}
