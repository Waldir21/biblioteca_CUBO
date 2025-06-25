@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4 mb-4 text-center">Bienvenido al Panel de Administración</h1>
    <p class="text-center font-bold">Desde aquí podrás gestionar el sistema.</p>

    <!-- Cuadro gris con botones -->
    <div class="bg-gray-200 p-5 rounded-lg shadow mt-5">
    <h3 class="text-xl font-semibold mb-4">Gestión de Contenido</h3>

    <div class="botones-panel">
       <a href="{{ route('clientes.index') }}" class="boton-dashboard bg-verde">
    <i class="fas fa-users"></i> Clientes
</a>

        <a href="#" class="boton-dashboard bg-azul"><i class="fas fa-book"></i> Libros</a>
        <a href="#" class="boton-dashboard bg-morado"><i class="fas fa-headphones"></i> Audiolibros</a>
        <a href="#" class="boton-dashboard bg-amarillo"><i class="fas fa-book-open"></i> Libros Físicos</a>
        <a href="#" class="boton-dashboard bg-rojo"><i class="fas fa-clipboard-list"></i> Libros Prestados</a>
    </div>
</div>

</div>


<style>/* Contenedor de todo el bloque de botones */
.botones-panel {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px; /* Espacio entre botones */
    margin-top: 30px;
}

/* Cada botón como tarjeta */
.boton-dashboard {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 200px;
    height: 100px;
    border-radius: 15px;
    font-size: 18px;
    font-weight: bold;
    color: white;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.boton-dashboard:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 16px rgba(0,0,0,0.2);
}

/* Colores individuales */
.bg-verde     { background-color: #38a169; }
.bg-azul      { background-color: #3182ce; }
.bg-morado    { background-color: #9f7aea; }
.bg-amarillo  { background-color: #ecc94b; color: #333; }
.bg-rojo      { background-color: #f56565; }

.boton-dashboard i {
    margin-right: 8px;
    font-size: 22px;

}


</style>
@endsection
