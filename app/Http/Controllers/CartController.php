<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indumentaria;
use App\Models\Categoria;
use App\Models\Talle;
use App\Models\Stock;

class CartController extends Controller
{
    public function shop()
    {
        $carrito = \Cart::getContent();
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $talle=Talle::all();
        foreach($carrito as $itemcarrito){
            $cantidad=$itemcarrito->cantidad;
            $idStock=$itemcarrito->idstock;
            $listadoStock=Stock::where('id',$idStock)->orderByDesc('id')->get();
            foreach($listadoStock as $stock){
                $cantidadStock=$stock->cantidad;
                $cantidadNuevaStock=$cantidadStock-$cantidad;
                Stock::where('id', $idStock)->update(['cantidad'=>$cantidadNuevaStock]);
            }
        }
        //dd($indumentaria);
        \Cart::clear();
        return view('cart.shop')->with([
            'cartCollection'=>$carrito,
            'indumentarias'=>$indumentaria,
            'talles'=>$talle,
        ]);
    }

    public function cart()  {
        $carrito = \Cart::getContent();
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        //dd($cartCollection);
        return view('cart.index')->with([
            'cartCollection' => $carrito,
            'categorias'=>$categoria,
            'indumentarias'=>$indumentaria,
            'talles'=>$talle,
        ]);
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        $carrito = \Cart::getContent();
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        return redirect()->route('cart.index')->with([
            'cartCollection' => $carrito,
            'categorias'=>$categoria,
            'indumentarias'=>$indumentaria,
            'talles'=>$talle,
        ]);
    }

    public function add(Request $request){
        $arr_producto=array(
            'idstock'=>$request->idstock,
            'idproducto' => $request->idProducto,
            'idtalle'=>$request->talle,
            'cantidad'=> $request->cantidad);
        \Cart::add($arr_producto);
        $carrito = \Cart::getContent();
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        return redirect()->route('cart.index')->with([
            'cartCollection' => $carrito,
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
        $carrito = \Cart::getContent();
        $indumentaria=Indumentaria::where('estado',0)->orderByDesc('id')->get();
        $categoria=Categoria::all();
        $talle=Talle::all();
        return redirect()->route('cart.index')->with([
            'cartCollection' => $carrito,
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
