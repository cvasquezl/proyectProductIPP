<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validar los datos del formulario

        // Crear el nuevo usuario
        $user = User::createUser([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'ciudad' => $request->input('ciudad'),
            'genero' => $request->input('genero')
        ]);

        // Redirigir al usuario a la página de inicio de sesión
        return redirect()->route('login');
    }
}
