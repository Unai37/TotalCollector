<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Favorito;

class CartaController extends Controller
{
    public function baseSet(Request $request)
    {
        return $this->mostrarColeccion($request, 'base1', 'colecciones.base-set');
    }

    public function championsPath(Request $request)
    {
        return $this->mostrarColeccion($request, 'swsh35', 'colecciones.champions-path');
    }

    public function scarletViolet(Request $request)
    {
        return $this->mostrarColeccion($request, 'sv1', 'colecciones.scarlet-violet');
    }

    private function mostrarColeccion(Request $request, $setId, $vista)
    {
        $page = $request->get('page', 1);

        $response = Http::get('https://api.pokemontcg.io/v2/cards', [
            'q' => "set.id:{$setId}",
            'pageSize' => 50,
            'page' => $page,
        ]);

        $cartas = collect($response->json()['data'])->sortBy(function ($carta) {
            return $carta['nationalPokedexNumbers'][0] ?? 9999;
        })->values();

        $totalCount = $response->json()['totalCount'] ?? 0;

        $favoritas = [];
        if (session()->has('usuario_id')) {
            $favoritas = Favorito::where('Id_Usuario', session('usuario_id'))
                ->pluck('id_carta')
                ->toArray();
        }

        return view($vista, [
            'cartas' => $cartas,
            'currentPage' => $page,
            'hasMorePages' => $page * 50 < $totalCount,
            'favoritas' => $favoritas,
        ]);
    }
}
