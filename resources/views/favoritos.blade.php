@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-4xl font-pokemon text-red-600 mb-6 text-center">Tus Cartas Favoritas</h1>

    @if ($cartas->isEmpty())
        <p class="text-center text-gray-700 text-lg">No has añadido cartas a favoritos todavía.</p>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach ($cartas as $carta)
                <div class="bg-yellow-100 border-4 border-red-400 rounded-xl p-3 text-center shadow-lg hover:shadow-xl transition">
                    <img src="{{ $carta->Imagen }}" alt="{{ $carta->Nombre }}" class="w-full h-40 object-contain mb-2 bg-white p-1 rounded-lg">
                    <span class="font-semibold text-sm text-gray-800">{{ $carta->Nombre }}</span>
                    <form action="{{ route('favoritos.eliminar') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="id_carta" value="{{ $carta->Id_Carta }}">
                        <button type="submit" class="mt-1 text-xs text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded-full font-pokemon">
                            Eliminar
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
