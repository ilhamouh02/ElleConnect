<?php

namespace App\Http\Controllers;

use App\Models\User; // Assurez-vous d'avoir le modèle pour la table Elle_users
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les utilisateurs avec leur rôle
        $users = User::with('role')->get(); // Supprimé 'gender'
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Assurez-vous que le nom de la table est correct
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
            'id_role' => 'required|integer'
        ]);

        // Création d'un nouvel utilisateur
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hachage du mot de passe
            // Ajoutez d'autres champs si nécessaire selon votre table
        ]);

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trouver l'utilisateur par son ID
        $user = User::findOrFail($id);

        // Retourner la vue de détail de l'utilisateur
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validation des données
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,{$id}", // Ignorer l'utilisateur actuel pour l'unicité
            'password' => 'nullable|string|min:8|confirmed',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
            'id_role' => 'required|integer'
        ]);

        // Trouver l'utilisateur par son ID
        $user = User::findOrFail($id);

        // Mettre à jour les informations de l'utilisateur
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Hachage du mot de passe uniquement si fourni
        }
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->comment = $request->comment;
        $user->id_role = $request->id_role;

        $user->save();

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('users.index')->with('success', "Utilisateur mis à jour avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Optionnel : Vous pouvez ajouter une vérification pour s'assurer que l'utilisateur ne peut pas se supprimer lui-même
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')->with('error', "Vous ne pouvez pas supprimer votre propre compte.");
        }

        $user->delete();

         // Rediriger vers la liste des utilisateurs avec un message de succès
         return redirect()->route('users.index')->with('success', "Utilisateur supprimé avec succès.");
    }
}   