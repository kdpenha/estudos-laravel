<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    //
    public function index(Request $request) {
        $titulo_pagina = 'Sobre Nós';
        return view('site.sobrenos', compact('titulo_pagina'));
    } 
}
