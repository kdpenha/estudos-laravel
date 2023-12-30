<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {

        echo $metodo_autenticacao.' - '.$perfil.'<br>';

        if($metodo_autenticacao == 'padrao') {
            echo 'Verificar o user e senha no banco'.'<br>';
        } else if($metodo_autenticacao == 'ldap') {
            echo 'Verificar no ldap'.'<br>';
        }

        if(false) {
            return $next($request);
        } else {
            return Response('Acesso negado. Rota exige autenticacao');
        }
    }
}
