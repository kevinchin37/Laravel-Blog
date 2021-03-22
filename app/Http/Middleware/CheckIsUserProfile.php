<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsUserProfile
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
        if ($request->user->id === auth()->id()) return $next($request);
        abort(404);
    }
}
