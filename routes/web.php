<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes/web.php
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/perfil', function () {
    return view('profile');
})->name('profile');

Route::get('/colecciones', function () {
    return view('colecciones');
})->name('colecciones');

// Subrutas para cada colección
Route::get('/colecciones/base-set', function () {
    return view('colecciones.base-set');
})->name('colecciones.base-set');

Route::get('/colecciones/champions-path', function () {
    return view('colecciones.champions-path');
})->name('colecciones.champions-path');

Route::get('/colecciones/scarlet-violet', function () {
    return view('colecciones.scarlet-violet');
})->name('colecciones.scarlet-violet');
