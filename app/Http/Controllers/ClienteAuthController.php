<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClienteAuthController extends Controller
{
    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Procesar el registro
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'edad' => 'required|integer|min:12',
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clientes',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'edad' => $request->edad,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('cliente')->login($cliente);

        return redirect()->route('home')->with('success', '¡Registro exitoso!');
    }

    // Mostrar formulario de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('cliente')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('cliente.libros');
        }

        return back()->withErrors([
            'email' => 'Estas credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Mostrar la vista del perfil del cliente
    public function perfil()
    {
        $cliente = Auth::guard('cliente')->user(); // Obtener cliente autenticado
        return view('cliente.perfil', compact('cliente'));
    }

    // Actualizar datos del perfil
    public function actualizarPerfil(Request $request)
    {
        $cliente = Auth::guard('cliente')->user();

        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'password' => 'nullable|string|min:6|confirmed',
            'foto' => 'nullable|image|max:2048', // max 2MB
        ]);

        $cliente->nombre = $request->nombre;
        $cliente->email = $request->email;

        // Manejar subida de foto y eliminar la anterior si existe
        if ($request->hasFile('foto')) {
            if ($cliente->foto) {
                Storage::delete($cliente->foto);
            }
            $path = $request->file('foto')->store('fotos_perfil');
            $cliente->foto = $path;
        }

        // Actualizar contraseña si se ingresó
        if ($request->password) {
            $cliente->password = Hash::make($request->password);
        }

        $cliente->save();

        return redirect()->route('cliente.perfil')->with('success', 'Perfil actualizado correctamente.');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::guard('cliente')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
