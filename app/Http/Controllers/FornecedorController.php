<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    //
    public function index(Request $request) {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }
    
    public function adicionar(Request $request) {

        $msg = '';
        
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

             Fornecedor::create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }

        return view('app.fornecedor.adicionar', compact('msg'));
    }

    public function editar(Request $request, $id) {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', compact('fornecedor');
    }
}
