<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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

Route::get('/', [App\Http\Controllers\PrincipalController::class, 'index'])
    ->name('site.index');
Route::get('/sobrenos', [App\Http\Controllers\SobreNosController::class, 'index'])->name('site.sobrenos');

Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'index'])
    ->name('site.contato');

Route::post('/contato',[App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [App\Http\Controllers\LoginController::class, 'index'])
    ->name('site.login');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'autenticar'])
    ->name('site.login');

Route::middleware('autenticacao:padrao,visitante')
    ->prefix('app')
    ->group(function() {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');

        Route::get('/sair', [App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');

        Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');
        
        Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
        
        Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');

        }
    );

/*
    Aula sobre parametros para os controllers

Route::get('teste/{p1}/{p2}',[App\Http\Controllers\TesteController::class, 'teste'])->name('teste');
*/

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir à página inicial.';
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