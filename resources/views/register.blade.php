@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Registro</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-2 rounded mb-4">
            <ul class="text-sm">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Nombre</label>
            <input type="text" name="nombre" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
        <label class="block mb-1">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" required class="w-full border px-3 py-2 rounded">
    </div>
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded">Crear Cuenta</button>
    </form>

    <p class="mt-4 text-center">
        ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-blue-600 underline">Inicia sesión</a>
    </p>
</div>
@endsection
