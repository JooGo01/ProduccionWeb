<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indumentaria;
use App\Models\Categoria;
use App\Models\Talle;

class CartController extends Controller
{
    public function shop()
    {
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        dd($products);
        return view('tienda.index')->with([
            'categorias'=>$categoria,
            'indumentarias'=>$indumentaria,
            'talles'=>$talle,
        ]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        //dd($cartCollection);
        return view('cart')->with([
            'cartCollection' => $cartCollection,
            'categorias'=>$categoria,
            'indumentarias'=>$indumentaria,
            'talles'=>$talle,
        ]);
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        $cartCollection = \Cart::getContent();
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        return redirect()->route('cart.index')->with([
            'cartCollection' => $cartCollection,
            'categorias'=>$categoria,
            'indumentarias'=>$indumentaria,
            'talles'=>$talle,
        ]);
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'cantidad'=> $request->cantidad,
        ));
        $cartCollection = \Cart::getContent();
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        return redirect()->route('cart.index')->with([
            'cartCollection' => $cartCollection,
            'categorias'=>$categoria,
            'indumentarias'=>$indumentaria,
            'talles'=>$talle,
        ]);
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        $cartCollection = \Cart::getContent();
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        return redirect()->route('cart.index')->with([
            'cartCollection' => $cartCollection,
            'categorias'=>$categoria,
            'indumentarias'=>$indumentaria,
            'talles'=>$talle,
        ]);
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

}