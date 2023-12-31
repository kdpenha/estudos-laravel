<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(Request $request) {
        
        $erro = '';

        if($request->get('erro') == 1) {
            $erro = 'Verifique as credenciais e tente novamente';
        } else if($request->get('erro') == 2) {
            $erro = 'Necessario realizar login para acessar a pagina';
        }

        return view('site.login', ['titulo_pagina' => 'Login', 'erro' => $erro]);
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

        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o model User
        $user = new User();

        $usuario = $user->where('email', $email)
                    ->where('password', $password)
                    ->get()
                    ->first();
        
        if(isset($usuario->name)) {

            session()->put('nome', $usuario->name);
            session(['email' => $usuario->email]);

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(Request $request){
        echo 'sair';
    }
}