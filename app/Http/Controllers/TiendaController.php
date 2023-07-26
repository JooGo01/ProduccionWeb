<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indumentaria;
use App\Models\Categoria;
use App\Models\Talle;
use App\Models\Stock;

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

    public function show($id)
    {
        //
        $indumentaria=Indumentaria::where('id', $id)->first();
        $stocks=Stock::where('id_indumentaria', $indumentaria->id)->get();
        $talles=Talle::all();
        return view('tienda.show', [
            'stock'=>$stocks,
            'productos'=>$indumentaria,
            'talles'=>$talles
        ]);
    }

    public function getCantidadStock($producto,$talle){
        $stock=Stock::where('id_indumentaria', $producto)->where('id_talle', $talle)->first();
        return response()->json([
            'stock'=>$stock
        ]);        
    }
}

?>