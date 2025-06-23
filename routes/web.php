<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteAuthController;
use App\Http\Controllers\LibroClienteController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Registro de cliente
Route::get('/registro-cliente', [ClienteAuthController::class, 'showRegister'])->name('cliente.showRegister');
Route::post('/registro-cliente', [ClienteAuthController::class, 'register'])->name('cliente.register');

// Login de cliente
Route::get('/login-cliente', [ClienteAuthController::class, 'showLogin'])->name('cliente.showLogin');
Route::post('/login-cliente', [ClienteAuthController::class, 'login'])->name('cliente.login');

// Logout de cliente
Route::post('/logout-cliente', [ClienteAuthController::class, 'logout'])->name('cliente.logout');

// Libros para cliente (protegido)
Route::middleware(['auth:cliente'])->group(function () {
    Route::get('/cliente/libros', [LibroClienteController::class, 'index'])->name('cliente.libros');
});

// Vista de inicio del cliente 
Route::get('/cliente', function () {
    return view('home');
})->name('cliente.inicio');

// Perfil del cliente
Route::middleware(['auth:cliente'])->group(function () {
    Route::get('/cliente/perfil', [ClienteAuthController::class, 'perfil'])->name('cliente.perfil');
    Route::put('/cliente/perfil', [ClienteAuthController::class, 'actualizarPerfil'])->name('cliente.perfil.update');
});
