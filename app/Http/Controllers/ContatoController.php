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
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedbacks = [
            'required' => 'O campo é obrigatório',
            'min' => 'É obrigatório ter no mínimo :min caracteres',
            'max' => 'É obrigatório ter no máximo :max caracteres',
            'email' => 'Deve ser um e-mail válido',
            'unique' => 'O nome informado ja esta em uso'
        ];

        $request->validate($chaves, $feedbacks);

        SiteContato::create($request->all());

        return redirect()->route('site.index'); //redireciona para a rota principal
    }

}
