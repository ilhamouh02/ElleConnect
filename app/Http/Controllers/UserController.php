<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; // Inclure le modèle Role pour la création/édition
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ajouter Auth si ce n'est pas inclus

/**
 * Contrôleur pour gérer les utilisateurs.
 */
class UserController extends Controller
{
    /**
     * Affiche la liste des utilisateurs.
     */
    public function index()
    {
        // Récupère tous les utilisateurs avec leur rôle associé
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Affiche le formulaire de création d'un nouvel utilisateur.
     */
    public function create()
    {
        // Récupère tous les rôles pour les afficher dans le formulaire
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Enregistre un nouvel utilisateur dans la base de données.
     *
     * @param Request $request La requête HTTP contenant les données de l'utilisateur.
     */
    public function store(Request $request)
    {
        // Valide les données de la requête
        $request->validate([
            'name' => 'required|string|max:255', // Nom d'affichage requis et maximum 255 caractères
            'email' => 'required|string|email|max:255|unique:users', // Email requis, valide et unique dans la table users
            'password' => 'required|string|min:8|confirmed', // Mot de passe requis, minimum 8 caractères et confirmé
            'first_name' => 'nullable|string|max:255', // Prénom optionnel et maximum 255 caractères
            'last_name' => 'nullable|string|max:255', // Nom de famille optionnel et maximum 255 caractères
            'comment' => 'nullable|string', // Commentaire optionnel
            'id_role' => 'required|integer', // Identifiant du rôle requis et entier
        ]);

        // Crée un nouvel utilisateur avec les données validées
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hache le mot de passe
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'comment' => $request->comment,
            'id_role' => $request->id_role,
        ]);

        // Redirige vers la liste des utilisateurs avec un message de succès
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Affiche les détails d'un utilisateur spécifique.
     *
     * @param int $id L'identifiant de l'utilisateur.
     */
    public function show($id)
    {
        // Récupère l'utilisateur par son identifiant
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Affiche le formulaire de modification d'un utilisateur spécifique.
     *
     * @param int $id L'identifiant de l'utilisateur.
     */
    public function edit($id)
    {
        // Récupère l'utilisateur par son identifiant
        $user = User::findOrFail($id);
        // Récupère tous les rôles pour les afficher dans le formulaire
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Met à jour les informations d'un utilisateur spécifique dans la base de données.
     *
     * @param Request $request La requête HTTP contenant les données mises à jour de l'utilisateur.
     * @param int $id L'identifiant de l'utilisateur.
     */
    public function update(Request $request, $id)
    {
        // Valide les données de la requête
        $request->validate([
            'name' => 'required|string|max:255', // Nom d'affichage requis et maximum 255 caractères
            'email' => "required|string|email|max:255|unique:users,email,{$id}", // Email requis, valide et unique dans la table users (sauf pour l'utilisateur actuel)
            'password' => 'nullable|string|min:8|confirmed', // Mot de passe optionnel, minimum 8 caractères et confirmé
            'first_name' => 'nullable|string|max:255', // Prénom optionnel et maximum 255 caractères
            'last_name' => 'nullable|string|max:255', // Nom de famille optionnel et maximum 255 caractères
            'comment' => 'nullable|string', // Commentaire optionnel
            'id_role' => 'required|integer', // Identifiant du rôle requis et entier
        ]);

        // Récupère l'utilisateur par son identifiant
        $user = User::findOrFail($id);

        // Met à jour les informations de l'utilisateur
        $user->name = $request->name;
        $user->email = $request->email;

        // Met à jour le mot de passe si fourni
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->comment = $request->comment;
        $user->id_role = $request->id_role;

        // Enregistre les modifications
        $user->save();

        // Redirige vers la liste des utilisateurs avec un message de succès
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprime un utilisateur spécifique de la base de données.
     *
     * @param int $id L'identifiant de l'utilisateur.
     */
    public function destroy($id)
    {
        // Récupère l'utilisateur par son identifiant
        $user = User::findOrFail($id);

        // Vérifie si l'utilisateur connecté essaie de supprimer son propre compte
        if ((int)$user->id === (int)Auth::id()) {
            return redirect()->route('users.index')->with('error', "Vous ne pouvez pas supprimer votre propre compte.");
        }

        // Supprime l'utilisateur
        $user->delete();

        // Redirige vers la liste des utilisateurs avec un message de succès
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
