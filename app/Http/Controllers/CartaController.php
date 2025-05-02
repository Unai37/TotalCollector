<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;


class CartaController extends Controller
{
    public function baseSet(Request $request)
    {
        $page = $request->get('page', 1);
        $data = $this->getCartasOrdenadasPorPokedex('base1', $page);

        return view('colecciones.base-set', $data);
    }

    public function championsPath(Request $request)
    {
        $page = $request->get('page', 1);
        $data = $this->getCartasOrdenadasPorPokedex('swsh35', $page);

        return view('colecciones.champions-path', $data);
    }

    public function scarletViolet(Request $request)
    {
        $page = $request->get('page', 1);
        $data = $this->getCartasOrdenadasPorPokedex('sv1', $page);

        return view('colecciones.scarlet-violet', $data);
    }

    private function getCartasOrdenadasPorPokedex($setId, $page = 1)
    {
        $response = Http::get('https://api.pokemontcg.io/v2/cards', [
            'q' => "set.id:{$setId}",
            'pageSize' => 50,
            'page' => $page,
        ]);

        $cartas = $response->json()['data'];
        $totalCount = $response->json()['totalCount'] ?? 0;

        $cartasOrdenadas = collect($cartas)->sortBy(function ($carta) {
            return $carta['nationalPokedexNumbers'][0] ?? 9999;
        })->values();

        return [
            'cartas' => $cartasOrdenadas,
            'currentPage' => $page,
            'totalCount' => $totalCount,
            'hasMorePages' => $page * 50 < $totalCount,
        ];
    }

}

