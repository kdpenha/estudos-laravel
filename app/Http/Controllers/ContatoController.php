<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    //
    public function index(Request $request) {

        $titulo_pagina = 'Contato';

        //SiteContato::create($request->all());

        return view('site.contato', compact('titulo_pagina'));
    }

    public function salvar(Request $request) {

        //validar o request

        $chaves = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $request->validate($chaves);        

        //SiteContato::create($request->all());
    }


}
