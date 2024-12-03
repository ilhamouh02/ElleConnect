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
        $logements = Logement::all();
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
        $request->validate([
            'nb_Lit' => 'required|integer|min:1',
        ]);

        $logement = new Logement();
        $logement->id_Logement = $request->input('id_Logement');
        $logement->nb_Lit = $request->input('nb_Lit');
        $logement->save();

        return redirect()->route('logements.index')->with('success', 'Logement créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_Logement)
    {
        $logement = Logement::findOrFail($id_Logement);
        return view('logements.show', compact('logement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_Logement)
    {
        $logement = Logement::findOrFail($id_Logement);
        return view('logements.edit', compact('logement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_Logement)
    {
        $request->validate([
            'nb_Lit' => 'required|integer|min:1',
        ]);

        $logement = Logement::findOrFail($id_Logement);
        $logement->nb_Lit = $request->input('nb_Lit');
        $logement->save();

        return redirect()->route('logements.index')->with('success', 'Logement mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_Logement)
    {
        $logement = Logement::findOrFail($id_Logement);
        $logement->delete();

        return redirect()->route('logements.index')->with('success', 'Logement supprimé avec succès.');
    }
}
