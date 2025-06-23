@extends('layouts.app')

@section('content')

<div class="perfil-card">
    <h2>Mi Perfil</h2>
    <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $cliente->apellido }}</p>
    <p><strong>Edad:</strong> {{ $cliente->edad }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
    <p><strong>Correo electrónico:</strong> {{ $cliente->email }}</p>

    <button id="btnEditar" class="btn-editar">Editar mi perfil</button>
</div>

<!-- Modal edición -->
<div id="modalEditar" class="modal-overlay">
    <div class="modal">
        <div class="modal-avatar"></div>
        <form action="{{ route('cliente.perfil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}" required>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" value="{{ $cliente->apellido }}" required>

            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" value="{{ $cliente->edad }}" min="12" max="120" required>

            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ $cliente->telefono }}">

            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="{{ $cliente->direccion }}">

            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" value="{{ $cliente->email }}" required>

            <label for="password">Nueva contraseña (opcional)</label>
            <input type="password" name="password" id="password" placeholder="Dejar vacío para no cambiar">

            <label for="foto_perfil">Foto de perfil</label>
            <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*">

            <div class="btn-group">
                <button type="submit" class="btn-guardar">Guardar cambios</button>
                <button type="button" id="btnCancelar" class="btn-cancelar">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    const btnEditar = document.getElementById('btnEditar');
    const modalEditar = document.getElementById('modalEditar');
    const btnCancelar = document.getElementById('btnCancelar');

    btnEditar.addEventListener('click', () => {
        modalEditar.classList.add('active');
    });

    btnCancelar.addEventListener('click', () => {
        modalEditar.classList.remove('active');
    });

    // Cerrar modal al hacer clic fuera del contenido
    modalEditar.addEventListener('click', (e) => {
        if (e.target === modalEditar) {
            modalEditar.classList.remove('active');
        }
    });
</script>

<style>
    /* Card perfil */
    .perfil-card {
        max-width: 700px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: 12px;
        background: white;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        color: #2f5d28;
    }
    .perfil-card h2 {
        font-weight: 900;
        border-bottom: 3px solid #2f5d28;
        padding-bottom: 0.25rem;
        margin-bottom: 1.5rem;
    }
    .perfil-card p {
        margin-bottom: 1rem;
        font-size: 1.05rem;
    }
    .perfil-card p strong {
        color: #2f5d28;
        width: 140px;
        display: inline-block;
    }
    .btn-editar {
        background-color: #3faa1f;
        color: white;
        padding: 0.75rem 1.75rem;
        border-radius: 9999px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 1.5rem;
        display: inline-block;
    }
    .btn-editar:hover {
        background-color: #367817;
    }

    /* Modal overlay */
    .modal-overlay {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.4);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 999;
    }
    .modal-overlay.active {
        display: flex;
    }

    /* Modal container */
    .modal {
        background: white;
        border-radius: 12px;
        max-width: 900px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        padding: 2rem;
        display: flex;
        gap: 2rem;
        position: relative;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    /* Avatar en modal */
    .modal-avatar {
        flex: 1;
        max-width: 160px;
        height: 160px;
        border-radius: 50%;
        background-color: #6c757d;
        background-image: url('{{ $cliente->foto_perfil_url ?? '' }}'); /* Coloca aquí la ruta de la foto si existe */
        background-size: cover;
        background-position: center;
        border: 4px solid #3faa1f;
    }

    /* Formulario */
    form {
        flex: 2;
        display: flex;
        flex-wrap: wrap;
        gap: 1rem 2rem;
        align-items: flex-start;
    }
    form label {
        flex-basis: 40%;
        font-weight: 600;
        color: #2f5d28;
    }
    form input[type="text"],
    form input[type="email"],
    form input[type="number"],
    form input[type="password"],
    form input[type="file"] {
        flex-basis: 55%;
        padding: 0.5rem 0.75rem;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 1rem;
        outline-color: #3faa1f;
        box-sizing: border-box;
    }

    /* Botones */
    .btn-group {
        width: 100%;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    .btn-guardar {
        background-color: #3faa1f;
        color: white;
        padding: 0.75rem 1.75rem;
        border-radius: 9999px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-guardar:hover {
        background-color: #367817;
    }
    .btn-cancelar {
        background-color: #bbb;
        color: #333;
        padding: 0.75rem 1.75rem;
        border-radius: 9999px;
        border: none;
        cursor: pointer;
        font-weight: 600;
    }

</style>


@endsection
