<?php

namespace App\Http\Middleware;

use Closure;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$idrol)
    {
		if ($request->user()->id_rol == intval($idrol)) {
			return $next($request);
        }else{
			return abort(401);
		}
		
        
    }
}
