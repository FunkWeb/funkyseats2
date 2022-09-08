<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role): mixed
    {
        if (auth()->check() && auth()->user()->hasRole($role)) {
            return $next($request);
        }

        App::abort(404);
    }
}
