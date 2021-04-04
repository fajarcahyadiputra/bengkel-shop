<?php

namespace App\Http\Middleware;

use Closure;

class addToCart
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
        if (auth()->user() == NULL) {
            return response()->json('notLogin');
        }
        return $next($request);
    }
}
