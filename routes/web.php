<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteAuthController;
use App\Http\Controllers\LibroClienteController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Registro de cliente
Route::get('/registro-cliente', [ClienteAuthController::class, 'showRegister'])->name('cliente.showRegister');
Route::post('/registro-cliente', [ClienteAuthController::class, 'register'])->name('cliente.register');

// Login de cliente (y admin si usas login unificado)
Route::get('/login-cliente', [ClienteAuthController::class, 'showLogin'])->name('cliente.showLogin');
Route::post('/login-cliente', [ClienteAuthController::class, 'login'])->name('cliente.login');

// Logout cliente (protegido o público según necesidad)
Route::post('/logout-cliente', [ClienteAuthController::class, 'logout'])->name('cliente.logout');

// Rutas cliente protegidas
Route::middleware(['auth:cliente'])->group(function () {
    Route::get('/cliente/libros', [LibroClienteController::class, 'index'])->name('cliente.libros');
    Route::get('/cliente/perfil', [ClienteAuthController::class, 'perfil'])->name('cliente.perfil');
    Route::put('/cliente/perfil', [ClienteAuthController::class, 'actualizarPerfil'])->name('cliente.perfil.update');
});

// Rutas admin protegidas
Route::middleware(['auth:usuario'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout-admin', [ClienteAuthController::class, 'logout'])->name('logout-admin');
});
