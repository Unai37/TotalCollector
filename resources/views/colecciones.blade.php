@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-4xl font-pokemon text-red-600 mb-8 text-center">Colecciones Pokémon</h1>
    <p class="mb-8 text-center text-gray-800 text-lg">¡Explora las expansiones de cartas más icónicas del mundo Pokémon!</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <a href="{{ route('colecciones.base-set') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <img src="https://images.pokemontcg.io/base1/logo.png" alt="Base Set" class="w-full h-32 object-contain bg-white p-2 rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Base Set</h2>
                <p class="text-sm text-gray-700">La colección clásica original de cartas Pokémon.</p>
            </div>
        </a>
        <a href="{{ route('colecciones.champions-path') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <img src="https://images.pokemontcg.io/swsh35/logo.png" alt="Champion’s Path" class="w-full h-32 object-contain bg-white p-2 rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Champion’s Path</h2>
                <p class="text-sm text-gray-700">Cartas brillantes y deseadas por coleccionistas.</p>
            </div>
        </a>
        <a href="{{ route('colecciones.scarlet-violet') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <img src="https://images.pokemontcg.io/sv1/logo.png" alt="Scarlet & Violet" class="w-full h-32 object-contain bg-white p-2 rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Scarlet & Violet</h2>
                <p class="text-sm text-gray-700">La nueva generación con innovaciones estratégicas.</p>
            </div>
        </a>
        <a href="{{ route('colecciones.evolving-skies') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <img src="https://images.pokemontcg.io/swsh7/logo.png" alt="Evolving Skies" class="w-full h-32 object-contain bg-white p-2 rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Evolving Skies</h2>
                <p class="text-sm text-gray-700">Una colección con cartas de Eeveelutions</p>
            </div>
        </a>
        <a href="{{ route('colecciones.furious-fists') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <img src="https://images.pokemontcg.io/xy3/logo.png" alt="Furious Fists" class="w-full h-32 object-contain bg-white p-2 rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Furious Fists</h2>
                <p class="text-sm text-gray-700">Una colección centrada en Pokémon de tipo lucha como Lucario y Machamp.</p>
            </div>
        </a>
        <a href="{{ route('colecciones.hidden-fates') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <img src="https://images.pokemontcg.io/sm115/logo.png" alt="Hidden Fates" class="w-full h-32 object-contain bg-white p-2 rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Hidden Fates</h2>
                <p class="text-sm text-gray-700">Famosa por sus cartas brillantes, incluyendo versiones shiny de Pokémon populares.</p>
            </div>
        </a>
        <a href="{{ route('colecciones.losts-origin') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <img src="https://images.pokemontcg.io/swsh11/logo.png" alt="Lost Origin" class="w-full h-32 object-contain bg-white p-2 rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Lost Origin</h2>
                <p class="text-sm text-gray-700">Una colección que trae de vuelta la mecánica del Mundo Perdido con cartas oscuras y poderosas.</p>
            </div>
        </a>
        <a href="{{ route('colecciones.brilliant-stars') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <img src="https://images.pokemontcg.io/swsh9/logo.png" alt="Brilliant Stars" class="w-full h-32 object-contain bg-white p-2 rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Brilliant Stars</h2>
                <p class="text-sm text-gray-700">La colección que introduce cartas VSTAR con Pokémon deslumbrantes y brillantes.</p>
            </div>
        </a>
        <a href="{{ route('colecciones.cosmic-eclipse') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <img src="https://images.pokemontcg.io/sm12/logo.png" alt="Cosmic Eclipse" class="w-full h-32 object-contain bg-white p-2 rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Cosmic Eclipse</h2>
                <p class="text-sm text-gray-700">La última expansión de la serie Sun & Moon, con cartas TAG TEAM espectaculares y arte impresionante.</p>
            </div>
        </a>
    </div>
</div>
@endsection
