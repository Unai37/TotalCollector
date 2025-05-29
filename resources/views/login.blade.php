@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-20 bg-yellow-100 border-4 border-red-400 p-6 rounded-xl shadow-lg">
    <h2 class="text-3xl font-pokemon text-red-600 mb-6 text-center">Iniciar Sesión</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-center border border-red-300">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Email</label>
            <input type="email" name="email" required class="w-full border-2 border-gray-300 px-3 py-2 rounded-md">
        </div>
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Contraseña</label>
            <input type="password" name="password" required class="w-full border-2 border-gray-300 px-3 py-2 rounded-md">
        </div>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-pokemon py-2 rounded-full transition">Entrar</button>
    </form>

    <p class="mt-6 text-center text-gray-700">
        ¿No tienes cuenta?
        <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Regístrate aquí</a>
    </p>
</div>
@endsection
