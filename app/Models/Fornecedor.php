<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Item;

class Fornecedor extends Model
{
    use HasFactory, SoftDeletes;

    //trocando nome do ORM
    protected $table = 'fornecedores';

    //permitindo o create
    protected $fillable = ['nome','site','uf','email'];

    public function produtos(): HasMany
    {
        return $this->hasMany(Item::class, 'fornecedor_id', 'id');
    }
}
