<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Favorito;


class FavoritoController extends Controller
{
    public function index()
    {
        $usuarioId = Session::get('usuario_id');

        if (!$usuarioId) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus favoritos.');
        }

        $favoritos = Favorito::where('Id_Usuario', $usuarioId)->get();

        return view('favoritos', ['cartas' => $favoritos]);
    }


    public function agregar(Request $request)
    {
        $usuarioId = Session::get('usuario_id');

        DB::table('favoritos')->insert([
            'Id_Usuario' => $usuarioId,
            'Id_Carta' => $request->id_carta,
            'Nombre' => $request->nombre,
            'Imagen' => $request->imagen,
            'Coleccion' => $request->coleccion
        ]);

        return back();
    }

    public function eliminar(Request $request)
    {
        $usuarioId = Session::get('usuario_id');

        DB::table('favoritos')
            ->where('Id_Usuario', $usuarioId)
            ->where('Id_Carta', $request->id_carta)
            ->delete();

        return view("favoritos");
    }
}
