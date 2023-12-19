<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    //
    public function index(Request $request) {

        $titulo_pagina = 'Contato';

        $motivo_contatos = [
            '1' => 'Duvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];

        //SiteContato::create($request->all());

        return view('site.contato', compact('titulo_pagina', 'motivo_contatos'));
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
