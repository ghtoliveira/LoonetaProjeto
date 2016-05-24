<?php

namespace App\Http\Middleware;

use Closure;

class ChecarFuncao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user() === null){
            return response("Você não possui permissão para acessar essa página", 401);
        }

        $actions = $request->route()->getAction();
        $funcoes = isset($actions['funcoes']) ? $actions['funcoes'] : null;

        if($request->user()->possuiFuncoes($funcoes) || !$funcoes){
            return $next($request);
        }

        return response("Você não possui permissão para acessar essa página", 401);

    }
}
