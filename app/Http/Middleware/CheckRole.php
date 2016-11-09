<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role) //aqui adicionamos um parametro para o middleware
    {

        if(!Auth::check()) {
            return redirect('/auth/login');
        }

        if(Auth::user()->role <> $role) { //se a role do usuário autenticado bate com a $role que passamos
            if(Auth::user()->role == 'estabelecimento') {
                return redirect('/cliente');
            }
            return redirect('/auth/login');
        }
        return $next($request);
    }
}
