<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemDetalhe;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
    protected $table = 'produtos';

    public function itemDetalhe()        
    {
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }
}
