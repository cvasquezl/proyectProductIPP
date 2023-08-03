<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/welcom', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [LoginController::class, 'login'])->name('login');

Route::get('register', function () {
    return view('register');
})->name('register');

Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('consulta', function () {
    return view('consulta');
})->name('consulta');

Route::get('home', function () {
    return view('home');
})->name('home');

Route::post('home', [HomeController::class, 'index'])->name('home');

