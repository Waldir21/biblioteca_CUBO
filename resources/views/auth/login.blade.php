@extends('layouts.app')
@section('title', 'Iniciar Sesión')
@section('content')

<div class="login-card">
    <h2>Iniciar Sesión</h2>
    @if ($errors->any())
        <div class="error-box">
            @foreach ($errors->all() as $error)
                <div>⚠️ {{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('cliente.login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" required value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" required>
        </div>
        <div class="login-options">
            <label><input type="checkbox" name="remember" style="margin-right: 5px;"> Recordarme</label>
            <a href="#">¿Olvidaste tu contraseña?</a>
        </div>
        <button type="submit" class="btn-login">Iniciar Sesión</button>
        <div class="register-link">
            ¿No tienes una cuenta? <a href="{{ route('cliente.showRegister') }}">Regístrate</a>
        </div>
    </form>
</div>

<style>
    body {
        background: #e9fdf2;
        font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
        max-width: 400px;
        margin: 80px auto;
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .login-card h2 {
        text-align: center;
        color: #1f8f4c;
        margin-bottom: 25px;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }

    .form-group input:focus {
        outline: none;
        border-color: #1f8f4c;
        box-shadow: 0 0 5px rgba(31, 143, 76, 0.3);
    }

    .login-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        margin-bottom: 15px;
    }

    .login-options a {
        text-decoration: none;
        color: #1f8f4c;
    }

    .btn-login {
        background-color: #1f8f4c;
        color: white;
        padding: 12px;
        width: 100%;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-login:hover {
        background-color: #156f3a;
    }

    .register-link {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    .register-link a {
        color: #1f8f4c;
        font-weight: bold;
        text-decoration: none;
    }

    .error-box {
        background-color: #ffe0e0;
        color: #a10000;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 13px;
    }
</style>
@endsection
