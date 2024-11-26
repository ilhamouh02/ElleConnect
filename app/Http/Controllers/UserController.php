<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs avec leur rôle
        $users = User::with('role')->get(); // Supprimé 'gender'
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
            'id_role' => 'required|integer'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'comment' => $request->comment,
            'id_role' => $request->id_role,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,{$user->id}",
            'password' => 'nullable|string|min:8|confirmed',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
            'id_role' => 'required|integer'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->comment = $request->comment;
        $user->id_role = $request->id_role;

        $user->save();

        return redirect()->route('users.index')->with('success', "Utilisateur mis à jour avec succès.");
    }

    public function destroy(User $user)
    {
        // Optionnel : Vous pouvez ajouter une vérification pour s'assurer que l'utilisateur ne peut pas se supprimer lui-même
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')->with('error', "Vous ne pouvez pas supprimer votre propre compte.");
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', "Utilisateur supprimé avec succès.");
    }
}
