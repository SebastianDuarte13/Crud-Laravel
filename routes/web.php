<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/libros/crear', [App\Http\Controllers\LibrosController::class, 'crear'])->name('libros.crear');

route::post('/libros/store', [App\Http\Controllers\LibrosController::class, 'store'])->name('libros.store');

route::get('/libros/leer', [App\Http\Controllers\LibrosController::class, 'leer'])->name('libros.leer');

route::put('/libros/{libro}', [App\Http\Controllers\LibrosController::class, 'update'])->name('libros.update');

route::get('/libros/eliminar', [App\Http\Controllers\LibrosController::class, 'eliminar'])->name('libros.eliminar');
Route::delete('/libros/{id}', [App\Http\Controllers\LibrosController::class, 'destroy'])->name('libros.destroy');
