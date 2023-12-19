<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    //
    public function index(Request $request) {
        $titulo_pagina = 'Principal';
        
        $motivo_contatos = MotivoContato::all();

        return view('site.principal', compact('titulo_pagina', 'motivo_contatos'));
    } 
}
