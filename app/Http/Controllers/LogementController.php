<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    public function index()
    {
        $logements = Logement::all(); // Récupérer tous les logements
        return view('logements.index', compact('logements'));
    }

    public function create()
    {
        return view('logements.create'); // Afficher le formulaire pour créer un nouveau logement
    }

    public function store(Request $request)
    {
        $request->validate([
            'code_logement' => 'required|string|max:255|unique:logements,code_logement', // Validation du code du logement
            'nombre_lits' => 'required|integer|min:1', // Validation du nombre de lits
        ]);

        Logement::create($request->all()); // Créer un nouveau logement

        return redirect()->route('logements.index')->with('success', 'Logement créé avec succès.'); // Redirection avec message de succès
    }

    // public function show(Logement $logement)
    // {
    //     return view('logements.show', compact('logement')); // Afficher les détails d'un logement spécifique
    // }

    public function show(Logement $logement)
{
    return view('logements.show', compact('logement')); // Afficher les détails d'un logement spécifique
}


    public function edit(Logement $logement)
    {
        return view('logements.edit', compact('logement')); // Afficher le formulaire pour éditer un logement
    }

    public function update(Request $request, Logement $logement)
    {
        $request->validate([
            'code_logement' => "required|string|max:255|unique:logements,code_logement,{$logement->id}", // Validation pour la mise à jour
            'nombre_lits' => 'required|integer|min:1', // Validation du nombre de lits
        ]);

        $logement->update($request->all()); // Mettre à jour le logement

        return redirect()->route('logements.index')->with('success', 'Logement mis à jour avec succès.'); // Redirection avec message de succès
    }

    public function destroy(Logement $logement)
    {
        $logement->delete(); // Supprimer le logement

        return redirect()->route('logements.index')->with('success', 'Logement supprimé avec succès.'); // Redirection avec message de succès
    }
}
