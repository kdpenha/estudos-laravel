<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteContato::create([
            'nome'=>'Sistema SG',
            'telefone'=>'(21) 99999-7777',
            'email'=>'contato@sg.com.br',
            'motivo_contato' => 1,
            'mensagem'=>'seja bem vindo ao sistema Super gestao'
        ]);
    }
}
