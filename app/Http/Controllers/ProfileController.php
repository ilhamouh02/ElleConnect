<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Contrôleur pour gérer le profil de l'utilisateur.
 */
class ProfileController extends Controller
{
    /**
     * Affiche le formulaire de modification du profil de l'utilisateur.
     *
     * @param Request $request La requête HTTP contenant l'utilisateur connecté.
     * @return View La vue du formulaire de modification du profil.
     */
    public function edit(Request $request): View
    {
        // Renvoyer la vue du formulaire de modification du profil avec l'utilisateur connecté
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Met à jour les informations du profil de l'utilisateur.
     *
     * @param ProfileUpdateRequest $request La requête HTTP contenant les données validées pour la mise à jour du profil.
     * @return RedirectResponse Redirection vers la page de modification du profil avec un message de succès.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Remplir les attributs de l'utilisateur avec les données validées
        $request->user()->fill($request->validated());

        // Si l'email a été modifié, réinitialiser la date de vérification de l'email
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Enregistrer les modifications de l'utilisateur
        $request->user()->save();

        // Rediriger vers la page de modification du profil avec un message de succès
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Supprime le compte de l'utilisateur.
     *
     * @param Request $request La requête HTTP contenant les données de suppression du compte.
     * @return RedirectResponse Redirection vers la page d'accueil après suppression du compte.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Valider le mot de passe de l'utilisateur avant de supprimer le compte
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Récupérer l'utilisateur connecté
        $user = $request->user();

        // Déconnecter l'utilisateur
        Auth::logout();

        // Supprimer le compte de l'utilisateur
        $user->delete();

        // Invalider la session et régénérer le token de session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Rediriger vers la page d'accueil
        return Redirect::to('/');
    }
}
