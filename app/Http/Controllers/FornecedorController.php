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
        return view('app.fornecedor.adicionar');
    }
}
