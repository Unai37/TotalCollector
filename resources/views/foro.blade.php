@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-pokemon text-red-600 mb-6 text-center">Foro de Preguntas</h1>

    @if (session('mensaje'))
        <div class="bg-green-100 border-4 border-green-300 text-green-900 px-4 py-3 rounded-lg mb-6 text-center shadow">
            {{ session('mensaje') }}
        </div>
    @endif

    @if($rol == 2)
    <form action="{{ route('foro.crear') }}" method="POST" class="mb-8 bg-yellow-100 border-4 border-red-400 p-4 rounded-xl shadow-md">
        @csrf
        <textarea name="texto" required class="w-full border-2 border-gray-300 rounded p-3 resize-none" placeholder="Escribe tu pregunta..."></textarea>
        <button type="submit" class="mt-3 bg-blue-600 text-white font-pokemon px-4 py-2 rounded-full hover:bg-blue-700 transition">Publicar Pregunta</button>
    </form>
    @endif

    @foreach($preguntas as $pregunta)
    <div class="bg-white border-4 border-yellow-300 rounded-xl p-4 mb-6 shadow-lg">
        <p class="font-semibold text-gray-800">{{ $pregunta->Nombre }} preguntó:</p>
        <p class="mb-2 text-gray-700">{{ $pregunta->Texto }}</p>
        <small class="text-gray-500">Fecha: {{ $pregunta->Fecha_Creacion }}</small>

        @if($rol == 1)
        <form action="{{ route('foro.responder') }}" method="POST" class="mt-3">
            @csrf
            <input type="hidden" name="id_pregunta" value="{{ $pregunta->Id }}">
            <textarea name="texto" required class="w-full border-2 border-gray-300 rounded p-2 resize-none" placeholder="Responder..."></textarea>
            <button type="submit" class="mt-2 bg-green-500 text-white font-pokemon px-4 py-1 rounded-full hover:bg-green-600 transition">Responder</button>
        </form>
        <form action="{{ route('foro.eliminar', $pregunta->Id) }}" method="POST" class="mt-2" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta pregunta?');">
            @csrf @method('DELETE')
            <button type="submit" class="text-sm text-red-500 hover:underline">Eliminar pregunta</button>
        </form>
        @endif

        @if(count($pregunta->respuestas) > 0)
        <div class="mt-4 pl-4 border-l-4 border-red-300">
            @foreach($pregunta->respuestas as $respuesta)
            <div class="mb-2">
                <p><strong class="text-blue-700">{{ $respuesta->Nombre }}:</strong> {{ $respuesta->Texto }}</p>
                <small class="text-gray-400">Fecha: {{ $respuesta->Fecha_Creacion }}</small>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    @endforeach
</div>
@endsection
