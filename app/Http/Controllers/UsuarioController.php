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
            'nombre' => 'required|string|max:100',
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

        return redirect()->back()->with('mensaje', 'Los cambios se han guardado correctamente.');
    }

    public function borrar(Request $request)
    {
        $id = Session::get('usuario_id');

        DB::beginTransaction();

        try {
            // 1. Eliminar relaciones en entradausuario
            DB::table('entradausuario')->where('Id_Usuario', $id)->delete();

            // 2. Eliminar favoritos
            DB::table('favoritos')->where('Id_Usuario', $id)->delete();

            // 3. Eliminar relaciones de roles
            DB::table('usuariorol')->where('Id_Usuario', $id)->delete();

            // 4. Eliminar entradas donde el usuario es el único relacionado
            $entradas = DB::table('entradausuario')
                ->select('Id_Entrada')
                ->where('Id_Usuario', $id)
                ->pluck('Id_Entrada');

            foreach ($entradas as $entradaId) {
                $usuariosRelacionados = DB::table('entradausuario')
                    ->where('Id_Entrada', $entradaId)
                    ->count();

                if ($usuariosRelacionados <= 1) {
                    // Eliminar la entrada solo si no está compartida con otros usuarios
                    DB::table('entrada')->where('Id', $entradaId)->delete();
                }
            }

            // 5. Finalmente eliminar el usuario
            DB::table('usuario')->where('Id', $id)->delete();

            DB::commit();

            Session::flush();

            return redirect('/')->with('mensaje', 'Tu cuenta y todos tus datos han sido eliminados con éxito.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al eliminar la cuenta: ' . $e->getMessage());
        }
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
