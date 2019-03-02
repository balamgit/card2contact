<?php

namespace App\Http\Middleware;

use Closure;

class temp
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
        if (2019>2018){
            return 'hello';
        }
        return $next($request);
    }
}
