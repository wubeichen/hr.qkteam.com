<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!\Auth::check() || !$request->user()->role || !in_array($request->user()->role->alias, $roles)) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
