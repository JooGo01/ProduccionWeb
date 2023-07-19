<?php

namespace App\Http\Controllers;

use App\Models\Indumentaria;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndumentariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listadoIndumentarias=Indumentaria::where('estado',0)->paginate(5);
        return view('indumentarias.index', [
            'productos' => $listadoIndumentarias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categoria=Categoria::all();
        return view('indumentarias.create', [
            'categorias'=>$categoria
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules=[
            'nombre'=>'required',
            'descripcion'=>'required',
            'categoria_id'=>'required',
            'imagen'=>'required|mimes:jpg,bmp,png',
            'precio'=>'required|max:9999999'
        ];

        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()
		            ->route('indumentarias.create')
		            ->withErrors($validator)
		            ->withInput();
        }
        
        $imagen_nombre=time() . $request->file('imagen')->getClientOriginalName();
        $imagen=$request->file('imagen')->storeAs('indumentarias', $imagen_nombre, 'public');
        Indumentaria::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'imagen'=>$imagen,
            'id_categoria'=>$request->categoria_id,
            'precio'=>$request->precio,
        ]);
        return redirect()->route('indumentarias.index')->with('status', 'La indumentaria se ha agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Indumentaria $indumentaria)
    {
        //
        $categoria=Categoria::where('id',$indumentaria->id_categoria)->first();
        return view('indumentarias.show', [
            'producto'=>$indumentaria,
            'categoria'=>$categoria,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indumentaria $indumentaria)
    {
        //
        $categoria=Categoria::all();
        return view ('indumentarias.edit', [
            'producto'=>$indumentaria,
            'categorias'=>$categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indumentaria $indumentaria)
    {
        //
        $rules=[
            'nombre'=>'required',
            'descripcion'=>'required',
            'categoria_id'=>'required',
            'imagen'=>'required|mimes:jpg,bmp,png',
            'precio'=>'required|max:9999999'
        ];
        
        
        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()
            ->route('indumentarias.edit')
            ->withErrors($validator)
            ->withInput();
        }
        
        $imagen_nombre=time() . $request->file('imagen')->getClientOriginalName();
        $imagen=$request->file('imagen')->storeAs('indumentarias', $imagen_nombre, 'public');
        $indumentaria->update([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'imagen'=>$imagen,
            'id_categoria'=>$request->categoria_id,
            'precio'=>$request->precio,
        ]);
        return redirect()->route('indumentarias.index')->with('status', 'La indumentaria se ha modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indumentaria $indumentaria)
    {
        //
        $indumentaria->update([
            'estado'=>1,
        ]);
        return redirect()->route('indumentarias.index')->with('status', 'La indumentaria se ha eliminado correctamente.');
    }
}
