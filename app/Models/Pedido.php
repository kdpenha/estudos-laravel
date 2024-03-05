<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
use App\Models\Item;

class Pedido extends Model
{
    use HasFactory;
    
    protected $fillable = ['cliente_id'];

    public function produtos(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id');
        /*
        1- modelo do relacionamento n pra n em relacao ao modelo que estamos implementando
        2- eh a table auxiliar que armazena os registros de relacionamento
        3 - representa o nome da fk da table mapeada pelo model na table de relacionamento
        4 - nome da fk da table mapeada pelo model utilizada no relacionemnto que estamos implementando
        */
    }
}
