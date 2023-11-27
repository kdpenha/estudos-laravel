<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //
    public function index(Request $request) {
        $titulo_pagina = 'Principal';

        return view('site.principal', compact('titulo_pagina'));
    } 
}
