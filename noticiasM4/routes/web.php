<?php

use App\Http\Controllers\NoticiaController;
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

Route::get('/', [NoticiaController::class, 'index'])->name('noticias');
Route::post('crear', [NoticiaController::class, 'crear'])->name('crear');

Route::get('actualizar/{id}', [NoticiaController::class, 'mostrarActualizar'])->name('mostrarActualizar');
Route::post('actualizar', [NoticiaController::class, 'actualizar'])->name('actualizar');

Route::get('crear', [NoticiaController::class, 'mostrarCrear'])->name('mostrarCrear');
Route::post('crear', [NoticiaController::class, 'crear'])->name('crear');
Route::post('eliminar', [NoticiaController::class, 'eliminar'])->name('eliminar');
