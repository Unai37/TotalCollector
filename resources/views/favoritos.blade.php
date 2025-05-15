@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Tus Cartas Favoritas</h1>

    @if ($cartas->isEmpty())
        <p>No has añadido cartas a favoritos.</p>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach ($cartas as $carta)
                <div class="bg-white shadow rounded p-2 flex flex-col items-center text-center">
                    <img src="{{ $carta->Imagen }}" alt="{{ $carta->Nombre }}" class="w-full h-auto mb-2">
                    <span class="font-semibold text-sm">{{ $carta->Nombre }}</span>
                    <form action="{{ route('favoritos.eliminar') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="id_carta" value="{{ $carta->Id_Carta }}">
                        <button type="submit" class="text-red-500 text-xs">Eliminar</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
