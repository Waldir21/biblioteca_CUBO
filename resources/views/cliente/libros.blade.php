@extends('layouts.app')
@section('content')

<div class="row">
    <!-- Sidebar fijo a la izquierda -->
    <div class="col-md-2">
        <div class="sidebar-wrapper shadow-sm">
            <h5 class="mb-3">Categorías</h5>
            @forelse($categorias as $categoria)
                <form method="GET" action="{{ route('cliente.libros') }}" class="mb-2">
                    <input type="hidden" name="categoria" value="{{ $categoria->categoria }}">
                    <button type="submit"
                        class="sidebar-categoria {{ $categoriaSeleccionada === $categoria->categoria ? 'active' : '' }}">
                        <span>{{ $categoria->categoria }}</span>
                        <span class="badge">{{ $categoria->count }}</span>
                    </button>
                </form>
            @empty
                <p>No hay categorías.</p>
            @endforelse
        </div>
    </div>

    <!-- Cards de libros -->
    <div class="col-md-10">
        <div class="row justify-content-center">
            @forelse($libros as $libro)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border shadow-sm">
                        <img src="{{ $libro->imagen_url }}" class="card-img-top" alt="Libro">
                        <div class="card-body">
                            <h5 class="card-title">{{ $libro->titulo }}</h5>
                            <p class="card-text">{{ $libro->descripcion }}</p>
                            <p class="card-text"><strong>Autor:</strong> {{ $libro->autor }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-custom">Leer libro</a>
                            <a href="#" class="btn btn-custom">Audiolibro</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No se encontraron libros.</p>
            @endforelse
        </div>

        <!-- Paginación -->
        {{ $libros->links('vendor.pagination.bootstrap-5') }}

    </div>
</div>

<style>
    .sidebar-categoria {
        border: none;
        background: #212529;
        border-radius: 10px;
        padding: 10px 15px;
        font-weight: bold;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        transition: background 0.2s ease;
    }

    .sidebar-categoria:hover {
        background: #343a40;
    }

    .sidebar-categoria.active {
        background: #000;
    }

    .sidebar-categoria .badge {
        background-color: #f8f9fa;
        color: #000;
        font-weight: bold;
        border-radius: 50%;
        padding: 4px 10px;
    }

   .card-img-top {
    width: 100%;
    height: auto;
    object-fit: contain;
    max-height: 250px; /* o ajústalo según tu diseño */
    display: block;
    margin: 0 auto;
}


    .btn-custom {
        border: 2px solid black;
        background: white;
        color: black;
        padding: 6px 12px;
        margin: 5px;
        width: 120px;
        text-align: center;
    }

    .btn-custom:hover {
        background: black;
        color: white;
    }

    .paginacion {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .card-text {
        font-size: 0.95rem;
        color: #555;
    }

    .sidebar-wrapper {
        background: white;
        padding: 20px;
        border-radius: 12px;
        height: fit-content;
    }

    .card-footer {
        background: white;
        border-top: none;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
nav[role="navigation"] {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

nav[role="navigation"] .flex.items-center {
    gap: 6px;
}

nav[role="navigation"] a, 
nav[role="navigation"] span {
    padding: 6px 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    color: #333;
    text-decoration: none;
    font-weight: 500;
    transition: background 0.2s;
}

nav[role="navigation"] a:hover {
    background-color: #000;
    color: #fff;
}

nav[role="navigation"] .active {
    background-color: #28a745;
    color: #fff !important;
    font-weight: bold;
    border-color: #28a745;
}
/* Elimina estilos visuales raros */
.dataTables_wrapper,
.dataTables_paginate,
.dataTables_info {
    display: none !important;
}

/* Corrige íconos de flechas gigantes si existieran */
svg.w-5.h-5 {
    width: 1rem !important;
    height: 1rem !important;
}

/* Mejora la paginación de Laravel por defecto */
.pagination {
    justify-content: center;
}

.page-item .page-link {
    color: #000;
    border: 1px solid #ccc;
    margin: 0 3px;
}

.page-item.active .page-link {
    background-color: #198754; /* verde Bootstrap */
    color: white;
    border-color: #198754;
}
</style>
@endsection
