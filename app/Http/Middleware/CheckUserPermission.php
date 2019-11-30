<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class CheckUserPermission
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
        if (auth()->user()->role->name == 'admin') return $next($request);

        $routeAction = explode('\\', Route::current()->getActionName());
        $currentRouteAction = end($routeAction);

        $permissions = auth()->user()->role->permissions->map(function ($item) {
            return $item->controller . '@' . $item->action;
        });
        $permissions = $permissions->all();

        if (in_array($currentRouteAction, $permissions)) {
            return $next($request);
        }

        return abort(403, 'Unauthorized action.');
    }
}
