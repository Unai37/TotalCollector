<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function actualizar(Request $request)
    {
        $request->validate([
            'nombre
            ' => 'required|string|max:100',
            'password' => 'nullable|string|min:6',
        ]);

        $id = Session::get('usuario_id');

        $data = [
            'Nombre' => $request->nombre,
        ];

        if ($request->filled('password')) {
            $data['Contraseña'] = Hash::make($request->password);
        }

        DB::table('usuario')->where('Id', $id)->update($data);

        Session::put('usuario_nombre', $request->nombre);

        return back()->with('success', 'Datos actualizados correctamente.');
    }

    public function borrar(Request $request)
    {
        $id = Session::get('usuario_id');

        // Eliminar registros relacionados primero si es necesario (por ejemplo: UsuarioRol)
        DB::table('UsuarioRol')->where('Id_Usuario', $id)->delete();
        DB::table('usuario')->where('Id', $id)->delete();

        Session::flush(); // Cerrar sesión

        return redirect('/login')->with('success', 'Cuenta eliminada correctamente.');
    }
    public function profile()
    {
        $id = session('usuario_id');

        $usuario = DB::table('usuario')->where('Id', $id)->first();

        if (!$usuario) {
            return redirect()->route('login')->with('error', 'Usuario no encontrado.');
        }

        return view('profile', ['usuario' => $usuario]);
    }


}
