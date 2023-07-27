<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto.index');
    }

    public function submitForm(Request $request)
    {
        /*return view('contacto.submit', [
            'datos'=>$request
        ]);*/
        return view('contacto.submit')->with('datos', $request);
        /*
        'telefono'=>$request->telefono,
            'motivo'=>$request->motivo,
            'mensaje'=>$request->mensaje,
            'mail'=>$request->mail''
        */
    }
}
