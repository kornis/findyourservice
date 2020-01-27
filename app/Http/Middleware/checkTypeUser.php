<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class checkTypeUser
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
        //middleware para validar si el usuario registrado es administrador y restringir acceso a paginas de administracion.
        if(Auth::user()->type_user != "Admin")
        {
            $err = "err_permission";
       
            return redirect()->route('index_err',$err);
        }
        return $next($request);
    }
}
