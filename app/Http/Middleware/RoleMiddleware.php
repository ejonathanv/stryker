<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        
        $user = auth()->user();

        foreach($roles as $role){
            if($user->role == $role){
                return $next($request);
            }
        }

        return redirect()->back()->with('message', 'Acceso denegado.');

    }
}
