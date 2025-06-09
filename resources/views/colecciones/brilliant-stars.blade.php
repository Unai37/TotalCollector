@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-pink-50 to-orange-50 rounded-xl p-8 mb-10 shadow-inner">
    <div class="text-center mb-6">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-2 tracking-tight">Brilliant Stars</h1>
        <p class="text-lg text-gray-600">La colección que introduce cartas VSTAR con Pokémon deslumbrantes y brillantes.</p>
    </div>
    <div class="flex justify-center">
        <img src="https://images.pokemontcg.io/swsh9/logo.png" alt="Brilliant Stars"
             class="w-64 h-64 object-contain drop-shadow-md hover:scale-105 transition-transform duration-300">
    </div>

    <p class="text-gray-600">Total de cartas: 216<br>Lanzamiento: Febrero 2022</p>

    @if (session('mensaje'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 text-sm text-center">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @foreach ($cartas as $carta)
            <div class="bg-white shadow rounded p-2 flex flex-col items-center text-center">
                <img src="{{ $carta['images']['small'] }}" alt="{{ $carta['name'] }}" class="w-full h-auto mb-2">
                <span class="font-semibold text-sm">{{ $carta['name'] }}</span>
                @if (!empty($carta['nationalPokedexNumbers']))
                    <span class="text-xs text-gray-500">Nº Pokedex #{{ $carta['nationalPokedexNumbers'][0] }}</span>
                @endif

                @if (session()->has('usuario_id'))
                    @php $yaFavorito = in_array($carta['id'], $favoritas ?? []); @endphp

                    @if ($yaFavorito)
                        <span class="text-green-500 text-xs mt-1">✅ En favoritos</span>
                    @else
                        <form action="{{ route('favoritos.agregar') }}" method="POST" class="mt-1">
                            @csrf
                            <input type="hidden" name="id_carta" value="{{ $carta['id'] }}">
                            <input type="hidden" name="nombre" value="{{ $carta['name'] }}">
                            <input type="hidden" name="imagen" value="{{ $carta['images']['small'] }}">
                            <input type="hidden" name="coleccion" value="{{ $carta['set']['name'] ?? 'Desconocida' }}">
                            <button type="submit" class="text-blue-500 text-xs">❤️ Añadir a favoritos</button>
                        </form>
                    @endif
                @endif

                <button onclick="ampliarCarta('{{ $carta['images']['large'] }}')" class="text-xs text-gray-600 mt-1">🔍 Ampliar</button>
            </div>
        @endforeach
    </div>

    <div class="flex justify-between items-center mt-8">
        @if ($currentPage > 1)
            <a href="{{ route('colecciones.brilliant-stars', ['page' => $currentPage - 1]) }}" class="bg-pink-300 px-4 py-2 rounded">
                ← Anterior
            </a>
        @else
            <span></span>
        @endif

        @if ($hasMorePages)
            <a href="{{ route('colecciones.brilliant-stars', ['page' => $currentPage + 1]) }}" class="bg-pink-300 px-4 py-2 rounded">
                Siguiente →
            </a>
        @endif
    </div>
</div>

<!-- Modal de ampliación -->
<div id="modalCarta" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
    <div class="relative">
        <button onclick="cerrarModal()" class="absolute top-2 right-2 text-white text-xl font-bold">&#10006;</button>
        <img id="modalImagen" src="" alt="Carta ampliada"
             class="rounded shadow-lg transition-transform duration-300"
             style="max-width: 90vw; max-height: 80vh; width: auto; height: auto; object-fit: contain;">
    </div>
</div>

<script>
    function ampliarCarta(imagenUrl) {
        const modal = document.getElementById('modalCarta');
        const img = document.getElementById('modalImagen');
        img.src = imagenUrl;
        modal.classList.remove('hidden');
    }

    function cerrarModal() {
        const modal = document.getElementById('modalCarta');
        modal.classList.add('hidden');
        document.getElementById('modalImagen').src = '';
    }
</script>
@endsection
