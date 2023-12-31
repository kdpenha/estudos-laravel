<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index() {

        return view('site.login', ['titulo_pagina' => 'Login']);
    }

    public function autenticar(Request $request) {
        
        //regras de validacao
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        //feedbacks
        $feedback = [
            'usuario.required' => 'O campo e-mail e obrigatorio',
            'usuario.email' => 'O e-mail deve ser valido',
            'senha.required' => 'O campo senha e obrigatorio'
        ];

        $request->validate($regras, $feedback);
        print_r($request->all());
    }
}