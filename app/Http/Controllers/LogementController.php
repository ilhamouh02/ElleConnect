<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les logements
        $logements = Logement::all();

        // Retourner la vue avec les logements
        return view('logements.index', compact('logements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nb_Lit' => 'required|integer|min:1', // Assurez-vous que le nombre de lits est valide
        ]);

        // Création d'un nouveau logement
        Logement::create($request->all());

        // Rediriger vers la liste des logements avec un message de succès
        return redirect()->route('logements.index')->with('success', 'Logement créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trouver le logement par son ID
        $logement = Logement::findOrFail($id);

        // Retourner la vue de détail du logement
        return view('logements.show', compact('logement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Trouver le logement par son ID
         $logement = Logement::findOrFail($id);

         // Retourner la vue d'édition avec les données du logement
         return view('logements.edit', compact('logement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validation des données
         $request->validate([
            'nb_Lit' => 'required|integer|min:1', // Assurez-vous que le nombre de lits est valide
            // Note : Ne pas valider id_Logement ici car il ne doit pas changer lors de la mise à jour.
        ]);

        // Trouver le logement par son ID
        $logement = Logement::findOrFail($id);

        // Mettre à jour les informations du logement
        $logement->nb_Lit = $request->nb_Lit;
        
        $logement->save();

        // Rediriger vers la liste des logements avec un message de succès
        return redirect()->route('logements.index')->with('success', "Logement mis à jour avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Trouver le logement par son ID
         $logement = Logement::findOrFail($id);

         // Supprimer le logement
         $logement->delete();

         // Rediriger vers la liste des logements avec un message de succès
         return redirect()->route('logements.index')->with('success', "Logement supprimé avec succès.");
    }
}
