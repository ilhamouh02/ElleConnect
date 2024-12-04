<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|array $roles
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $user = Auth::user();

        if (!$user || !$user->role) {
            return redirect('/')->with('error', 'Accès refusé. Vous devez être connecté avec un rôle valide.');
        }

        // Convertir $roles en tableau si c'est une chaîne
        $rolesArray = is_array($roles) ? $roles : explode('|', $roles);

        // Vérifier si l'utilisateur a un des rôles requis
        if (!in_array($user->role->label, $rolesArray)) {
            return redirect('/dashboard')->with('error', 'Accès refusé. Vous n’avez pas les autorisations nécessaires.');
        }

        return $next($request);
    }
}
