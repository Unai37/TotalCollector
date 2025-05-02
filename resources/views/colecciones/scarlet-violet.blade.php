@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Scarlet & Violet</h1>
    <p class="mb-6">La generación más reciente con nuevas mecánicas.</p>

    <img src="https://images.pokemontcg.io/sv2/logo.png" alt="Scarlet & Violet" class="w-48 h-48 object-contain mx-auto mb-6">

    <p class="text-gray-600">Total de cartas: 444<br>Lanzamiento: Marzo 2023</p>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @foreach ($cartas as $carta)
            <div class="bg-white shadow rounded p-2 flex flex-col items-center text-center">
                <img src="{{ $carta['images']['small'] }}" alt="{{ $carta['name'] }}" class="w-full h-auto mb-2">
                <span class="font-semibold text-sm">{{ $carta['name'] }}</span>
                @if (!empty($carta['nationalPokedexNumbers']))
                    <span class="text-xs text-gray-500">#{{ $carta['nationalPokedexNumbers'][0] }}</span>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="flex justify-between items-center mt-8">
        @if ($currentPage > 1)
            <a href="{{ route('colecciones.scarlet-violet', ['page' => $currentPage - 1]) }}" class="bg-pink-300 px-4 py-2 rounded">
                ← Anterior
            </a>
        @else
            <span></span>
        @endif

        @if ($hasMorePages)
            <a href="{{ route('colecciones.scarlet-violet', ['page' => $currentPage + 1]) }}" class="bg-pink-300 px-4 py-2 rounded">
                Siguiente →
            </a>
        @endif
    </div>
</div>
@endsection
