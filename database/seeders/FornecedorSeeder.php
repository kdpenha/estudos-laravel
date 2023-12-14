<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fornecedor::create([
            'nome'=>'Fornecedor 100',
            'site'=>'fornecedor100.com.br',
            'uf'=>'ce',
            'email'=>'contato@fornecedor100.com.br'
        ]);

        \DB::table('fornecedores')->insert([
            'nome'=>'Fornecedor 200',
            'site'=>'fornecedor200.com.br',
            'uf'=>'RS',
            'email'=>'contato@fornecedor200.com.br'
        ]);
    }
}
