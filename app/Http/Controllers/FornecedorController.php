<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    //
    public function index(Request $request) {

        $fornecedores = ['fornecedor 1'];
        
        echo $request->ip();

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
