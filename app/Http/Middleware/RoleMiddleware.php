<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Si el usuario no está logueado o su rol no coincide, lo mandamos al inicio
        if (!auth()->check() || auth()->user()->rol_id != $role) {
            return redirect('/home')->with('error', 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
