<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IndumentariaController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\TiendaController;
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

Route::get('/tienda', [
    TiendaController::class, 'index'
])->name('tienda.index');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['is_admin']], function(){
    Route::get('/categorias', [
        CategoriaController::class, 'index'
    ])->name('categorias.index');
    
    Route::get('/categorias/create', [
        CategoriaController::class, 'create'
    ])->name('categorias.create');
    
    Route::get('/panel', [
        PanelController::class, 'index'
    ])->name('panel.index');
    
    Route::resource('/categorias', CategoriaController::class);
    
    Route::resource('/indumentarias', IndumentariaController::class);
});
// Route::post('/home', [App\Http\Controllers\HomeController::class, 'inicio']);