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
