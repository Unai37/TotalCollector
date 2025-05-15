@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-600 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Entrar</button>
    </form>

    <p class="mt-4 text-center">
        ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-blue-600 underline">Regístrate aquí</a>
    </p>
</div>
@endsection
