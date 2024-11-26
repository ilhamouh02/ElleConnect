<?php

namespace App\Http\Controllers;

// app/Http/Controllers/StatusController.php

namespace App\Http\Controllers;

    use App\Models\Status;
    use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Afficher la liste des statuts
    public function index()
    {
        $statuses = Status::all();
        return view('statuses.index', compact('statuses'));
    }

    // Afficher le formulaire de création d'un statut
    public function create()
    {
        return view('statuses.create');
    }

    // Enregistrer un nouveau statut
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'demance_Valider' => 'boolean',
            'demand_en_cours' => 'boolean',
            'demande_Terminer' => 'boolean',
        ]);

        Status::create([
            'label' => $request->label,
            'demance_Valider' => $request->demance_Valider,
            'demand_en_cours' => $request->demand_en_cours,
            'demande_Terminer' => $request->demande_Terminer,
        ]);

        return redirect()->route('statuses.index');
    }

    // Afficher les détails d'un statut
    public function show(Status $status)
    {
        return view('statuses.show', compact('status'));
    }

    // Afficher le formulaire de modification d'un statut
    public function edit(Status $status)
    {
        return view('statuses.edit', compact('status'));
    }

    // Mettre à jour un statut
    public function update(Request $request, Status $status)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'demance_Valider' => 'boolean',
            'demand_en_cours' => 'boolean',
            'demande_Terminer' => 'boolean',
        ]);

        $status->update([
            'label' => $request->label,
            'demance_Valider' => $request->demance_Valider,
            'demand_en_cours' => $request->demand_en_cours,
            'demande_Terminer' => $request->demande_Terminer,
        ]);

        return redirect()->route('statuses.index');
    }

    // Supprimer un statut
    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('statuses.index');
    }
}

