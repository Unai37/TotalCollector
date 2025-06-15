<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Collector</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Google Fonts: Press Start 2P for Pokémon style -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <style>
        /* Usamos fuente Pokémon solo en títulos */
        .font-pokemon {
            font-family: 'Press Start 2P', cursive;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-yellow-100 via-red-100 to-blue-100 min-h-screen text-gray-800">

    <!-- Barra superior -->
    <header class="flex items-center justify-between px-6 py-4 bg-red-500 shadow-md text-white z-20">
        <div class="flex items-center gap-4">
            <button id="menu-toggle" class="text-2xl hover:text-yellow-300">&#9776;</button>
            <a href="{{ route('home') }}" class="text-xl font-pokemon tracking-wider hover:text-yellow-300">TOTAL COLLECTOR</a>
        </div>
        <a href="{{ route('profile') }}" class="flex items-center gap-2 font-semibold hover:text-yellow-300">
            {{ session('usuario_nombre', 'Mi Perfil') }}
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </a>
    </header>

    <!-- Menú lateral estilo Pokémon -->
    <aside id="sidebar" class="absolute left-0 top-16 w-64 bg-yellow-200 border-r-4 border-red-500 p-4 shadow-lg hidden z-50 rounded-r-xl">
        <ul class="space-y-3 font-semibold text-gray-800">
            <li><a href="{{ route('home') }}" class="block hover:text-red-600">Inicio</a></li>
            <li>
                <a href="{{ route('colecciones') }}" class="block hover:text-red-600">Colecciones</a>
                <ul class="ml-4 list-disc text-sm text-gray-700 space-y-1">
                    <li><a href="{{ route('colecciones.base-set') }}" class="hover:text-red-600">Base Set</a></li>
                    <li><a href="{{ route('colecciones.champions-path') }}" class="hover:text-red-600">Champion's Path</a></li>
                    <li><a href="{{ route('colecciones.scarlet-violet') }}" class="hover:text-red-600">Scarlet & Violet</a></li>
                    <li><a href="{{ route('colecciones') }}" class="hover:text-red-600">Mas...</a></li>
                </ul>
            </li>
            <li><a href="{{ route('favoritos') }}" class="block hover:text-red-600">Favoritos</a></li>
            <li><a href="{{ route('foro') }}" class="block hover:text-red-600">Foro</a></li>
        </ul>
    </aside>

    <!-- Contenido principal -->
    <main class="px-6 py-8">
        @yield('content')
    </main>

    <!-- Script para el menú -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>

</body>
</html>
