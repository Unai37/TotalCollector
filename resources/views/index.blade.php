@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-4xl font-pokemon text-red-600 mb-6">¡Bienvenido a Total Collector!</h1>

    <p class="mb-6 text-lg text-gray-800">
        Total Collector es el centro de reunión para los fans de las cartas coleccionables Pokémon. Organiza tus cartas, descubre nuevas expansiones, chatea con otros entrenadores y marca tus favoritas.
    </p>

    <h2 class="text-2xl font-pokemon text-yellow-700 mb-3">¿Dónde encontrarnos?</h2>
    <p class="mb-4 text-gray-800">Ven a visitarnos en nuestra tienda física ubicada en el corazón de Madrid:</p>

    <div class="w-full h-96 rounded-xl overflow-hidden border-4 border-red-400 shadow-lg">
        <iframe
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCRLdofjGHB58QewjnWPrqrm0n7aLyhLEg&q=Instituto+Virgen+de+la+Paloma,+Madrid,+España&zoom=15"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    <div class="max-w-6xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <a href="{{ route('colecciones') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Colecciones</h2>
                <p class="text-sm text-gray-700">Todas nuestras Colecciones</p>
            </div>
        </a>
        <a href="{{ route('favoritos') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Favoritos</h2>
                <p class="text-sm text-gray-700">Entra a tus cartas favoritas.</p>
            </div>
        </a>
        <a href="{{ route('foro') }}" class="bg-yellow-100 border-4 border-red-400 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 block">
            <div class="p-4">
                <h2 class="text-xl font-pokemon text-red-600 mb-2">Foro</h2>
                <p class="text-sm text-gray-700">Encuentra nuestro foro de preguntas.</p>
            </div>
        </a>
    </div>
</div>
</div>
@endsection
