<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Facades\URL;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentRoute = FacadesRoute::currentRouteName();

        if (!Auth::guard("admin")->check() && $currentRoute != "dashboard.login") {
            return redirect()->route("dashboard.login");
        }

        if (Auth::guard("admin")->check() && $currentRoute == "dashboard.login")
            return redirect()->route("dashboard.index");


        return $next($request);
    }
}
