<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Indumentaria;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('indumentarias.index', [
            'stock'=>$listadoStock,
            'productos' => $listadoIndumentarias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listadoIndumentarias=Indumentaria::all();
        return view('indumentarias.create', [
            'categorias'=>$listadoIndumentarias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
