<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IndumentariaController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StockController;
use App\Models\Talle;
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

//creamos una ruta para crear los talles
Route::get('/creartalle', function(){
    Talle::create(['talla'=>'S']);
    Talle::create(['talla'=>'M']);
    Talle::create(['talla'=>'L']);
    Talle::create(['talla'=>'XL']);
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

    Route::resource ('/stocks', StockController::class);
});

Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cantidadstock', [StockController::class, 'getCantidadStock']);

// Route::post('/home', [App\Http\Controllers\HomeController::class, 'inicio']);