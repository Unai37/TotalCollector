@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Colecciones Pokémon</h1>
    <p class="mb-6 text-gray-700">Explora las diferentes expansiones de cartas Pokémon disponibles en nuestra plataforma.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Ejemplo de colección -->
        <a href="{{ route('colecciones.base-set') }}" class="bg-white border shadow rounded-lg overflow-hidden block hover:shadow-lg">
            <img src="https://images.pokemontcg.io/base1/logo.png" alt="Base Set" class="w-full h-32 object-contain bg-gray-100 p-2">
            <div class="p-4">
                <h2 class="text-xl font-semibold">Base Set</h2>
                <p class="text-sm text-gray-600">La primera colección clásica de cartas Pokémon.</p>
            </div>
        </a>
        <a href="{{ route('colecciones.champions-path') }}" class="bg-white border shadow rounded-lg overflow-hidden block hover:shadow-lg">
            <img src="https://images.pokemontcg.io/swsh35/logo.png" alt="Champion’s Path" class="w-full h-32 object-contain bg-gray-100 p-2">
            <div class="p-4">
                <h2 class="text-xl font-semibold">Champion’s Path</h2>
                <p class="text-sm text-gray-600">Una expansión con cartas brillantes y populares.</p>
            </div>
        </a>
        <a href="{{ route('colecciones.scarlet-violet') }}" class="bg-white border shadow rounded-lg overflow-hidden block hover:shadow-lg">
            <img src="https://images.pokemontcg.io/sv2/logo.png" alt="Scarlet & Violet" class="w-full h-32 object-contain bg-gray-100 p-2">
            <div class="p-4">
                <h2 class="text-xl font-semibold">Scarlet & Violet</h2>
                <p class="text-sm text-gray-600">La generación más reciente con nuevas mecánicas.</p>
            </div>
        </a>

        <!-- Puedes añadir más colecciones aquí -->
    </div>
</div>
@endsection
