<?php

namespace App\Http\Middleware; //racine de fichier
use Auth;

use Closure;


class checkUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed // retour de plusieurs types
     */
    public function handle($request, Closure $next)
    {
        
        if (Auth::user()) {
            return $next($request);
        }else {
            return redirect(route('showClassroomList'));
        }
    }
}
