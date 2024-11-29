<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    public function index()
    {
        $logements = Logement::all();
        return view('logements.index', compact('logements'));
    }

    public function create()
    {
        return view('logements.create');
    }

    public function store(Request $request)
    {
        $logement = new Logement();
        $logement->id_Logement = $request->input('id_Logement');
        $logement->nb_Lit = $request->input('nb_Lit');
        $logement->save();
        return redirect()->route('logements.index');
    }

    public function show($id_Logement)
    {
        $logement = Logement::findOrFail($id_Logement);
        return view('logements.show', compact('logement'));
    }

    public function edit($id_Logement)
    {
        $logement = Logement::findOrFail($id_Logement);
        return view('logements.edit', compact('logement'));
    }

    public function update(Request $request, $id_Logement)
    {
        $logement = Logement::findOrFail($id_Logement);
        $logement->nb_Lit = $request->input('nb_Lit');
        $logement->save();
        return redirect()->route('logements.index');
    }

    public function destroy($id_Logement)
    {
        $logement = Logement::findOrFail($id_Logement);
        $logement->delete();
        return redirect()->route('logements.index');
    }
}