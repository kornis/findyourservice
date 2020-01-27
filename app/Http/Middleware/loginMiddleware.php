<?php

namespace App\Http\Middleware;

use Closure;

class loginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     //middleware que se encarga de verificar si existe un usuario en sesion y 
     //si el usuario está en sesion, no podrá ingresar a la vista de login ni de registro.
    public function handle($request, Closure $next)
    {
        if(!session('user_id')){
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
