<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    //
    public function index(Request $request) {

        $titulo_pagina = 'Contato';

        var_dump($_POST);

        return view('site.contato', compact('titulo_pagina'));
    }
}
