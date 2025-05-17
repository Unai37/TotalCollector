<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Buscar al usuario por el correo electrónico
    $usuario = DB::table('usuario')->where('email', $credentials['email'])->first();

    // Si no se encuentra el usuario
    if (!$usuario) {
        return back()->with('error', 'Credenciales incorrectas.');
    }

    // Verificar si la contraseña coincide con el hash en la base de datos
    if (!Hash::check($credentials['password'], $usuario->Contraseña)) {
        return back()->with('error', 'Credenciales incorrectas.');
    }

    // Obtener el rol del usuario
    $rol = DB::table('usuariorol')
        ->join('rol', 'usuariorol.Id_Rol', '=', 'Rol.Id')
        ->where('usuariorol.Id_Usuario', $usuario->Id)
        ->value('rol.Nombre'); // Asegúrate de que este campo esté correcto

    // Guardar en sesión
    Session::put('usuario_id', $usuario->Id);
    Session::put('usuario_nombre', $usuario->Nombre);
    Session::put('rol', $rol);

    // Redirigir al home
    return redirect()->route('home');
}

    public function logout()
    {
        Session::flush();
        return redirect()->route('logout.confirmado')->with('mensaje', 'Has cerrado sesión con éxito.');
    }
}

