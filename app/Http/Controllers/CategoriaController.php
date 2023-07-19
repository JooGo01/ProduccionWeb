<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listadoCategorias=Categoria::where('activo',0)->paginate(5);
        return view('categorias.index', [
            'categorias' => $listadoCategorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categorias.create');
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
        ];
        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()
		            ->route('categorias.create')
		            ->withErrors($validator)
		            ->withInput();
        }
        Categoria::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
        ]);
        return redirect()->route('categorias.index')->with('status', 'La categoria se ha agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
        return view('categorias.show', [
            'categoria'=>$categoria
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
        return view ('categorias.edit', [
            'categoria'=>$categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
        $rules=[
            'nombre'=>'required',
            'descripcion'=>'required',
        ];
        $validator=Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()
		            ->route('categorias.edit')
		            ->withErrors($validator)
		            ->withInput();
        }

        $categoria->update([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion
        ]);
        return redirect()->route('categorias.index')->with('status', 'La categoria se ha modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->update([
            'activo'=>1,
        ]);
        return redirect()->route('categorias.index')->with('status', 'La categoria se ha eliminado correctamente.');
    }
}
