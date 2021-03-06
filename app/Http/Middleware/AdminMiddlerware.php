<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddlerware
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
        if (auth()->user()->role === 'user') {
            return abort(403, "you Don't have access");
        }
        return $next($request);
    }
}
