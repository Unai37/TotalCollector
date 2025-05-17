<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ForoController extends Controller
{
    public function index()
    {
        $usuarioId = Session::get('usuario_id');

        // Obtener el rol del usuario
        $rol = DB::table('usuariorol')
            ->where('Id_Usuario', $usuarioId)
            ->value('Id_Rol');

        // Obtener preguntas con sus respuestas
        $preguntas = DB::table('entrada as e')
            ->join('entradausuario as eu', 'e.Id', '=', 'eu.Id_Entrada')
            ->join('usuario as u', 'eu.Id_Usuario', '=', 'u.Id')
            ->where('e.Tipo', 'pregunta')
            ->select('e.*', 'u.Nombre')
            ->orderBy('e.Fecha_Creacion', 'desc')
            ->get();

        foreach ($preguntas as $pregunta) {
            $pregunta->respuestas = DB::table('entrada as r')
                ->join('entradausuario as eu', 'r.Id', '=', 'eu.Id_Entrada')
                ->join('usuario as u', 'eu.Id_Usuario', '=', 'u.Id')
                ->where('r.Tipo', 'respuesta')
                ->where('r.Id_Pregunta', $pregunta->Id)
                ->select('r.*', 'u.Nombre')
                ->get();
        }

        return view('foro', compact('preguntas', 'rol'));
    }

    public function crearPregunta(Request $request)
    {
        $usuarioId = Session::get('usuario_id');

        $entradaId = DB::table('entrada')->insertGetId([
            'Fecha_Creacion' => Carbon::now(),
            'Texto' => $request->texto,
            'Tipo' => 'pregunta',
        ]);

        DB::table('entradausuario')->insert([
            'Id_Usuario' => $usuarioId,
            'Id_Entrada' => $entradaId,
        ]);

        return redirect()->route('foro');
    }

    public function responder(Request $request)
    {
        $usuarioId = Session::get('usuario_id');

        $respuestaId = DB::table('entrada')->insertGetId([
            'Fecha_Creacion' => Carbon::now(),
            'Texto' => $request->texto,
            'Tipo' => 'respuesta',
            'Id_Pregunta' => $request->id_pregunta,
        ]);

        DB::table('entradausuario')->insert([
            'Id_Usuario' => $usuarioId,
            'Id_Entrada' => $respuestaId,
        ]);

        return redirect()->route('foro');
    }

    public function eliminar($id)
    {
        // Eliminar respuestas primero
        DB::table('entrada')->where('Id_Pregunta', $id)->delete();
        // Eliminar relación
        DB::table('entradausuario')->where('Id_Entrada', $id)->delete();
        // Eliminar la entrada
        DB::table('entrada')->where('Id', $id)->delete();

        return redirect()->route('foro');
    }
}
