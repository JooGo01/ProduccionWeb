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

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function(){
    return view('inicio');
});

Route::get('/tienda', function(){
    return view('tienda');
});

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/home', [App\Http\Controllers\HomeController::class, 'inicio']);