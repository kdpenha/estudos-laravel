<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
    //
    public function __construct() {
        $this->middleware(LogAcessoMiddleware::class);
    }

    public function index(Request $request) {
        $titulo_pagina = 'Sobre Nós';
        return view('site.sobrenos', compact('titulo_pagina'));
    } 
}
