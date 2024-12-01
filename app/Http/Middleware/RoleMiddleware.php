<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, $roles)
    {
        $user = Auth::user();

        if (!$user || !$user->role) {
            return redirect('/')->with('error', 'Accès refusé. Vous devez être connecté avec un rôle valide.');
        }

        $rolesArray = is_array($roles) ? $roles : explode('|', $roles);

        if (!in_array($user->role->name, $rolesArray)) {
            return redirect('/dashboard')->with('error', 'Accès refusé. Vous n’avez pas les autorisations nécessaires.');
        }

        return $next($request);
    }
}
