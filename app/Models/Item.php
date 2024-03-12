<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\ItemDetalhe;
use App\Models\Pedido;
use App\Models\Fornecedor;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['fornecedor_id','nome', 'descricao', 'peso', 'unidade_id'];
    protected $table = 'produtos';

    public function itemDetalhe(): HasOne 
    {
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
    }

    public static function validar($request)
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
            'exists' => 'A unidade de medida informada nao existe',
            'fornecedor_id.exists' => 'O fornecedor informado nao existe'
        ];

        return $request->validate($regras, $feedbacks);
    }

    public function pedidos(): BelongsToMany
    {
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
