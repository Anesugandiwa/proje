<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->routeIs('filament.admin.auth.login')) {
            return $next($request);
        }

        if(!auth()->check()){
            return redirect()->route('filament.admin.auth.login');
        }

        if (!auth()->user()->isAdmin()) {
            abort(403, 'You are not allowed to access this page');
            
        }
        // if ($request->route()->getName() !== 'admin') {
        //     return redirect()->route('admin');
        // }
        return $next($request);

       
    }
}
