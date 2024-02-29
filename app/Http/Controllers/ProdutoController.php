<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Item;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //listar registros
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);
        //carregamento ansioso. ele passa junto com o relacionamento

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        /*$regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:40',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedbacks = [
            'required' => 'O campo e obrigatorio',
            'min' => 'O campo deve ter no minimo :min caracteres',
            'max' => 'O campo deve ter no maximo :max caracteres',
            'integer' => 'O campo deve ser numero',
            'exists' => 'A unidade de medida informada nao existe',
            'fornecedor_id.exists' => 'O fornecedor informado nao existe'
        ];

        $request->validate($regras, $feedbacks);*/

        Item::validar($request);
        Item::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto] ); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:40',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedbacks = [
            'required' => 'O campo e obrigatorio',
            'min' => 'O campo deve ter no minimo :min caracteres',
            'max' => 'O campo deve ter no maximo :max caracteres',
            'integer' => 'O campo deve ser numero',
            'unidade_id.exists' => 'A unidade de medida informada nao existe',
            'fornecedor_id.exists' => 'O fornecedor informado nao existe'
        ];

        $produto->update($request->all());
        
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
