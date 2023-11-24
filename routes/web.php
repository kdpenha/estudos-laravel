<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PrincipalController::class, 'index'])->name('site.principal');

Route::get('/sobrenos', [App\Http\Controllers\SobreNosController::class, 'index'])->name('site.sobrenos');

Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'index'])->name('site.contato');

Route::get('/login', function() {
    return 'login';
});

Route::prefix('app')->group(function () {

    Route::get('/clientes', function() {
        return 'clientes';
    });
    
    Route::get('/fornecedores', function() {
        return 'fornecedores';
    });
    
    Route::get('/produtos', function() {
        return 'produtos';
    });

});
/*
    Aula sobre parametrização dentro das rotas

Route::get('/contato/{nome}', function(string $nome) {
    echo "Estamos aqui $nome";
});
*/

/*
    Aula sobre parametros opcionais e valores default

Route::get('/contato/{nome}/{assunto?}', function(string $nome, string $assunto = 'valor default') {
    echo "Estamos aqui $nome, falando sobre $assunto";
});
*/

/*
    Aula sobre rotas com Regex

Route::get('/contato/{nome}/{categoria_id}', function(string $nome = 'Desconhecido', int $categoria_id = 1) {
    echo "Estamos aqui: $nome - $categoria_id";
})
    ->where('categoria_id', '[0-9]+')
    ->where('nome', '[A-Za-z]+');
*/