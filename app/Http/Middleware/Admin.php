<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Admin extends Middleware
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
      //  dd(auth()->user()->admin);
        if(auth()->user()->admin == 1)
        {
            return $next($request);
        }
        else
        {
            abort(403);
        }

        
    }
}
