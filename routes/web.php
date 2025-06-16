<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\ForoController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/colecciones', function () {
    return view('colecciones');
})->name('colecciones');

Route::get('/colecciones/base-set', [CartaController::class, 'baseSet'])->name('colecciones.base-set');
Route::get('/colecciones/champions-path', [CartaController::class, 'championsPath'])->name('colecciones.champions-path');
Route::get('/colecciones/scarlet-violet', [CartaController::class, 'scarletViolet'])->name('colecciones.scarlet-violet');
Route::get('/colecciones/evolving-skies', [CartaController::class, 'evolvingSkies'])->name('colecciones.evolving-skies');
Route::get('/colecciones/furious-fists', [CartaController::class, 'furiousFists'])->name('colecciones.furious-fists');
Route::get('/colecciones/hidden-fates', [CartaController::class, 'hiddenFates'])->name('colecciones.hidden-fates');
Route::get('/colecciones/lost-origin', [CartaController::class, 'lostOrigin'])->name('colecciones.lost-origin');
Route::get('/colecciones/brilliant-stars', [CartaController::class, 'brilliantStars'])->name('colecciones.brilliant-stars');
Route::get('/colecciones/cosmic-eclipse', [CartaController::class, 'cosmicEclipse'])->name('colecciones.cosmic-eclipse');



// 🛡 Rutas protegidas
Route::middleware('auth.session')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/perfil', [UsuarioController::class, 'profile'])->name('profile');
    Route::get('/foro', [ForoController::class, 'index'])->name('foro');
    Route::post('/foro/preguntar', [ForoController::class, 'crearPregunta'])->name('foro.crear');
    Route::post('/foro/responder', [ForoController::class, 'responder'])->name('foro.responder');
    Route::delete('/foro/eliminar/{id}', [ForoController::class, 'eliminar'])->name('foro.eliminar');
    Route::post('/usuario/actualizar', [UsuarioController::class, 'actualizar'])->name('usuario.actualizar');
    Route::post('/usuario/borrar', [UsuarioController::class, 'borrar'])->name('usuario.borrar');
    Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos');
    Route::post('/favoritos/agregar', [FavoritoController::class, 'agregar'])->name('favoritos.agregar');
    Route::post('/favoritos/eliminar', [FavoritoController::class, 'eliminar'])->name('favoritos.eliminar');
});
