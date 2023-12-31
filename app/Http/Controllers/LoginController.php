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
            
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}