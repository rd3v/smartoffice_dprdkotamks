<?php

namespace App\Http\Middleware;

use Closure;

class BendaharaMiddleware
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
        if($request->user() && $request->user()->level != "bendahara") {
            return redirect()->route('403');
        }
        return $next($request);
    }
}
