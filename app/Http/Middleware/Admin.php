<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('admin.view')){
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);

        /*$request->user()->authorizeRoles('admin');
        return $next($request);*/
    }
}