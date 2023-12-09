<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filial_id')->references('id')->on('filiais');
            $table->foreignId('produto_id')->references('id')->on('produtos');
            $table->decimal('preco_venda',8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();
        });

        //dropando as colunas preco venda e de estoques da table produtos
        Schema::table('produtos', function(Blueprint $table) {
            $table->dropColumn(['preco_venda','estoque_minimo','estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produto_filiais', function(Blueprint $table) {
            $table->dropForeign(['filial_id']);
            $table->dropForeign(['produto_id']);
        });

        Schema::dropIfExists('produto_filiais');

        Schema::table('produtos', function(Blueprint $table) {
            $table->decimal('preco_venda');
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });
    }
};
