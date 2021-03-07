<?php

namespace App\Http\Middleware;

use Closure;

class LoginRegister
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
        if (auth()->user()) {
            if (auth()->user()->role === 'user') {
                return redirect('/');
            } else if (auth()->user()->role === 'admin') {
                return redirect('/dashboard');
            }
        }
        return $next($request);
    }
}
