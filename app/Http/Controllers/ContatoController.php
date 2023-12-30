<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    //
    public function index(Request $request) {

        $titulo_pagina = 'Contato';

        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', compact('titulo_pagina', 'motivo_contatos'));
    }

    public function salvar(Request $request) {

        //validar o request

        $chaves = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $request->validate($chaves);

        SiteContato::create($request->all());

        return redirect()->route('site.index'); //redireciona para a rota principal
    }

}
