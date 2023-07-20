<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indumentaria;
use App\Models\Categoria;
use App\Models\Talle;

class TiendaController extends Controller
{
    public function index()
    {
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        return view('tienda.index', [
            'categorias'=>$categoria,
            'indumentarias'=>$indumentaria,
            'talles'=>$talle,
        ]);
    }
}

?>