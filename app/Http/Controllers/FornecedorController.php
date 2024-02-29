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

        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(10);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request]);
    }
    
    public function adicionar(Request $request) {

        $msg = '';
        
        if($request->input('_token') != '' && $request->input('id') == '') {
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

        //edicao
        if($request->input('_token') != '' && $request->input('id') != '') {
            
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Atualizacao realizada com sucesso';                
            } else {
                $msg = 'Atualizacao falhou';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', compact('msg'));
    }

    public function editar(Request $request, $id, $msg = '') {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', compact('fornecedor', 'msg'));
    }

    public function excluir(Request $request, $id) {
        
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor.listar');
    }
}
