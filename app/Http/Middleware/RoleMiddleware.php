<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Gérer une requête entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Vérifier si l'utilisateur est authentifié et s'il a le rôle spécifié
    // if (!auth()->check() || !auth()->user()->hasRole($role)) {
            // Si l'utilisateur n'a pas le rôle requis, rediriger ou afficher une erreur
          //  return redirect()->route('home')->with('error', 'Accès interdit, vous n\'avez pas le rôle requis.');
       // }


       if (!$request->user()->hasRole($role)) {
        return response()->json(['error' => 'Vous n\'avez pas les permissions nécessaires'], 403);
    }

        return $next($request);
    }
}
