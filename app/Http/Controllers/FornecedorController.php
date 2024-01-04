<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    //
    public function index(Request $request) {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        return view('app.fornecedor.listar');
    }
    
    public function adicionar(Request $request) {

        if($request->input('_token') != '') {
            //validar
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'required|email' 
            ];

            $feedbacks = [
                'required' => 'O campo é obrigatório',
                'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
                'max' => 'O campo :attribute deve ter no maximo :max caracteres',
                'email' => 'E-mail invalido'
            ];

            $request->validate($regras, $feedbacks);

            echo 'chegamos aqui';
        }
        return view('app.fornecedor.adicionar');
    }
}
