<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    //trocando nome do ORM
    protected $table = 'fornecedores';

    //permitindo o create
    protected $fillable = ['nome','site','uf','email'];
}
