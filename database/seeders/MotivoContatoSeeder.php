<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Model\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MotivoContato::create(['Dúvida']);
        MotivoContato::create(['Elogio']);
        MotivoContato::create(['Reclamação']);
    }
}
