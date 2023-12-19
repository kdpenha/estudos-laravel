<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //
    public function index(Request $request) {
        $titulo_pagina = 'Principal';
        
        $motivo_contatos = [
            '1' => 'Duvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];

        return view('site.principal', compact('titulo_pagina', 'motivo_contatos'));
    } 
}
