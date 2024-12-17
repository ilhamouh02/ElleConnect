<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

/**
 * Contrôleur pour gérer les rôles.
 */
class RoleController extends Controller
{
    /**
     * Affiche la liste des rôles.
     */
    public function index()
    {
        // Récupérer tous les rôles de la base de données
        $roles = Role::all();

        // Passer les rôles à la vue pour les afficher
        return view('roles.index', compact('roles'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau rôle.
     */
    public function create()
    {
        // Renvoyer la vue de création sans passer de données
        return view('roles.create');
    }

    /**
     * Enregistre un nouveau rôle dans la base de données.
     *
     * @param Request $request La requête HTTP contenant les données du rôle.
     */
    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'id_role' => 'required|integer|unique:roles', // Identifiant du rôle requis, entier et unique
            'label' => 'required|max:255', // Libellé du rôle requis et maximum 255 caractères
        ]);

        // Créer un nouveau rôle avec les données validées
        Role::create($request->all());

        // Rediriger vers la liste des rôles avec un message de succès
        return redirect()->route('roles.index')
            ->with('success', 'Rôle créé avec succès.');
    }

    /**
     * Affiche les détails d'un rôle spécifique.
     *
     * @param string $id L'identifiant du rôle.
     */
    public function show(string $id)
    {
        // Récupérer le rôle par son identifiant
        $role = Role::find($id);

        // Renvoyer la vue de détails avec le rôle
        return view('roles.show', compact('role'));
    }

    /**
     * Affiche le formulaire de modification d'un rôle spécifique.
     *
     * @param string $id L'identifiant du rôle.
     */
    public function edit(string $id)
    {
        // Récupérer le rôle par son identifiant
        $role = Role::find($id);

        // Renvoyer la vue de modification avec le rôle
        return view('roles.edit', compact('role'));
    }

    /**
     * Met à jour les informations d'un rôle spécifique dans la base de données.
     *
     * @param Request $request La requête HTTP contenant les données mises à jour du rôle.
     * @param string $id L'identifiant du rôle.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données de la requête
        $request->validate([
            'label' => 'required|max:255', // Libellé du rôle requis et maximum 255 caractères
        ]);

        // Récupérer le rôle par son identifiant
        $role = Role::find($id);

        // Mettre à jour les informations du rôle
        $role->update($request->all());

        // Rediriger vers la liste des rôles avec un message de succès
        return redirect()->route('roles.index')
            ->with('success', 'Rôle mis à jour avec succès.');
    }

    /**
     * Supprime un rôle spécifique de la base de données.
     *
     * @param string $id L'identifiant du rôle.
     */
    public function destroy(string $id)
    {
        // Récupérer le rôle par son identifiant
        $role = Role::find($id);

        // Supprimer le rôle
        $role->delete();

        // Rediriger vers la liste des rôles avec un message de succès
        return redirect()->route('roles.index')
            ->with('success', 'Rôle supprimé avec succès.');
    }
}
