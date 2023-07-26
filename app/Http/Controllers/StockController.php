<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Indumentaria;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Talle;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listadoStock=Stock::paginate(5);
        $listadoIndumentarias=Indumentaria::all();
        $listadoTalles=Talle::all();
        return view('stocks.index', [
            'stock'=>$listadoStock,
            'productos' => $listadoIndumentarias,
            'talles'=>$listadoTalles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listadoIndumentarias=Indumentaria::all();
        $listadoTalles=Talle::all();
        return view('stocks.create', [
            'productos' => $listadoIndumentarias,
            'talles'=>$listadoTalles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules=[
            'producto'=>'required',
            'talle'=>'required',
            'cantidad'=>'required|max:9999999'
        ];

        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()
		            ->route('stocks.create')
		            ->withErrors($validator)
		            ->withInput();
        }
        
        Stock::create([
            'id_indumentaria'=>$request->producto,
            'id_talle'=>$request->talle,
            'cantidad'=>$request->cantidad
        ]);
        return redirect()->route('stocks.index')->with('status', 'El registro de stock se ha agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
        $listadoIndumentarias=Indumentaria::where('id',$stock->id_indumentaria)->first();
        $listadoTalles=Talle::where('id',$stock->id_talle)->first();;
        return view('stocks.show', [
            'stock'=>$stock,
            'producto'=>$listadoIndumentarias,
            'talle'=>$listadoTalles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
        $listadoIndumentarias=Indumentaria::where('id',$stock->id_indumentaria)->first();
        $listadoTalles=Talle::where('id',$stock->id_talle)->first();;
        return view('stocks.edit', [
            'stock'=>$stock,
            'producto'=>$listadoIndumentarias,
            'talle'=>$listadoTalles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
        $rules=[
            'cantidad'=>'required|max:9999999'
        ];
        
        
        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()
            ->route('stocks.edit')
            ->withErrors($validator)
            ->withInput();
        }
        
        $stock->update([
            'cantidad'=>$request->cantidad
        ]);
        return redirect()->route('stocks.index')->with('status', 'La cantidad del stock se ha modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
        $stock->delete();
        return redirect()->route('stocks.index')->with('status', 'El registro del stock se ha eliminado correctamente.');
    }
}
