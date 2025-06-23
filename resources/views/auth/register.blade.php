@extends('layouts.app')
@section('title', 'Registro de Cliente')
@section('content')

<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <h2>Binevenido</h2>
        <p>Regístrate ahora, es gratis!</p>
        @if ($errors->any())
            <div class="error-box">
                <ul style="color: red; font-size: 13px; text-align: left; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('cliente.register') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="form-group">
                <input type="text" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" required>
            </div>
            <div class="form-group">
                <input type="number" name="edad" placeholder="Edad" value="{{ old('edad') }}" required>
            </div>
            <div class="form-group">
                <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
            </div>
            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" value="{{ old('direccion') }}">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
            </div>
            <div class="form-footer">
                <label><input type="checkbox" style="margin-right: 5px;"> Recordarme</label>
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit" class="btn-submit">Registrarse</button>
            <div class="login-link">
                ¿Ya tienes una cuenta? <a href="#">Iniciar sesión</a>
            </div>
        </form>
    </div>
</div>

<style>
    
    .card {
        width: 100%;
        max-width: 400px;
        background: #fff;
        border-radius: 20px;
        margin: 80px auto;
        box-shadow: 0 8px 30px rgba(0.5, 0.5, 0.4, 0.8);
        overflow: hidden;
    }

    .card-header {
        background: #2e2e3a;
        padding: 40px 20px 20px;
        text-align: center;
        position: relative;
        border-bottom: 2px solid #ccc;
    }

    .card-header .logo {
        background: #c94d70;
        width: 60px;
        height: 60px;
        line-height: 60px;
        border-radius: 50%;
        color: #fff;
        font-weight: bold;
        font-size: 24px;
        position: absolute;
        top: 60px;
        left: 50%;
        transform: translateX(-50%);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .card-body {
        padding: 80px 30px 30px;
        text-align: center;
    }

    .card-body h2 {
        font-size: 22px;
        color: #333;
        margin-bottom: 10px;
    }

    .card-body p {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 16px;
        text-align: left;
    }

    .form-group input {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 30px;
        font-size: 14px;
        outline: none;
        transition: border 0.3s;
    }

    .form-group input:focus {
        border-color:#30c213;
    }

    .form-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        color: #666;
        margin: 10px 0;
    }

    .form-footer a {
        color:  #30c213;
        text-decoration: none;
    }

    .btn-submit {
        width: 100%;
        background: #30c213;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 30px;
        font-weight: bold;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background:rgb(139, 139, 139);
    }

    .login-link {
        margin-top: 10px;
        font-size: 14px;
    }

    .login-link a {
        color: #30c213;
        text-decoration: none;
        font-weight: bold;
    }
</style>
@endsection
