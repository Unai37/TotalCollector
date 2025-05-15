@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Scarlet & Violet</h1>
    <p class="mb-6">La generación más reciente con nuevas mecánicas.</p>

    <img src="https://images.pokemontcg.io/sv2/logo.png" alt="Scarlet & Violet" class="w-48 h-48 object-contain mx-auto mb-6">

    <p class="text-gray-600">Total de cartas: 444<br>Lanzamiento: Marzo 2023</p>

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

<!-- Modal de ampliación -->
<div id="modalCarta" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
    <div class="relative">
        <button onclick="cerrarModal()" class="absolute top-2 right-2 text-white text-xl font-bold">&#10006;</button>
        <img id="modalImagen" src="" alt="Carta ampliada" class="max-h-[80vh] rounded shadow-lg transition-transform duration-300">
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