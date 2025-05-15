@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Foro de Preguntas</h1>

    @if($rol == 2)
    <form action="{{ route('foro.crear') }}" method="POST" class="mb-6">
        @csrf
        <textarea name="texto" required class="w-full border rounded p-2" placeholder="Escribe tu pregunta..."></textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Publicar Pregunta</button>
    </form>
    @endif

    @foreach($preguntas as $pregunta)
    <div class="bg-white shadow rounded p-4 mb-4">
        <p class="font-semibold">{{ $pregunta->Nombre }} preguntó:</p>
        <p class="mb-2">{{ $pregunta->Texto }}</p>
        <small class="text-gray-500">Fecha: {{ $pregunta->Fecha_Creacion }}</small>

        @if($rol == 1)
        <form action="{{ route('foro.responder') }}" method="POST" class="mt-2">
            @csrf
            <input type="hidden" name="id_pregunta" value="{{ $pregunta->Id }}">
            <textarea name="texto" required class="w-full border rounded p-2" placeholder="Responder..."></textarea>
            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded mt-1">Responder</button>
        </form>
        <form action="{{ route('foro.eliminar', $pregunta->Id) }}" method="POST" class="mt-1">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-500 text-sm">Eliminar pregunta</button>
        </form>
        @endif

        @if(count($pregunta->respuestas) > 0)
        <div class="mt-3 pl-4 border-l-2 border-gray-300">
            @foreach($pregunta->respuestas as $respuesta)
            <div class="mb-2">
                <p><strong>{{ $respuesta->Nombre }}:</strong> {{ $respuesta->Texto }}</p>
                <small class="text-gray-400">Fecha: {{ $respuesta->Fecha_Creacion }}</small>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    @endforeach
</div>
@endsection
