<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all(); // Récupérer tous les rôles
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create'); // Afficher le formulaire pour créer un nouveau rôle
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name', // Validation du nom du rôle
        ]);

        Role::create($request->all()); // Créer un nouveau rôle

        return redirect()->route('roles.index')->with('success', 'Rôle créé avec succès.'); // Redirection avec message de succès
    }

    public function show(Role $role)
    {
        return view('roles.show', compact('role')); // Afficher les détails d'un rôle spécifique
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role')); // Afficher le formulaire pour éditer un rôle
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => "required|string|max:255|unique:roles,name,{$role->id}", // Validation pour la mise à jour
        ]);

        $role->update($request->all()); // Mettre à jour le rôle

        return redirect()->route('roles.index')->with('success', 'Rôle mis à jour avec succès.'); // Redirection avec message de succès
    }

    public function destroy(Role $role)
    {
        $role->delete(); // Supprimer le rôle

        return redirect()->route('roles.index')->with('success', 'Rôle supprimé avec succès.'); // Redirection avec message de succès
    }
}
