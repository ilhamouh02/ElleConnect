<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Appeler la méthode d'authentification définie dans LoginRequest
        $request->authenticate();

        // Régénérer la session après une connexion réussie
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Déconnexion de l'utilisateur
        Auth::guard('web')->logout();

        // Invalider la session actuelle
        $request->session()->invalidate();

        // Régénérer le token CSRF pour des raisons de sécurité
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
