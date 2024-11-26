<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    // Afficher la liste des méthodes de paiement
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('payment_methods.index', compact('paymentMethods'));
    }

    // Afficher le formulaire de création d'une nouvelle méthode de paiement
    public function create()
    {
        return view('payment_methods.create');
    }

    // Enregistrer une nouvelle méthode de paiement
    public function store(Request $request)
    {
        // Valider les données
        $validatedData = $request->validate([
            'payment_type' => 'required|string|max:255',
        ]);

        // Créer la méthode de paiement
        PaymentMethod::create($validatedData);

        return redirect()->route('payment_methods.index')->with('success', 'Méthode de paiement ajoutée avec succès!');
    }

    // Afficher les détails d'une méthode de paiement
    public function show($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('payment_methods.show', compact('paymentMethod'));
    }

    // Afficher le formulaire d'édition d'une méthode de paiement
    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    // Mettre à jour une méthode de paiement
    public function update(Request $request, $id)
    {
        // Valider les données
        $validatedData = $request->validate([
            'payment_type' => 'required|string|max:255',
        ]);

        // Mettre à jour la méthode de paiement
        PaymentMethod::where('id_Paiement', $id)->update($validatedData);

        return redirect()->route('payment_methods.index')->with('success', 'Méthode de paiement mise à jour avec succès!');
    }

    // Supprimer une méthode de paiement
    public function destroy($id)
    {
        PaymentMethod::destroy($id);

        return redirect()->route('payment_methods.index')->with('success', 'Méthode de paiement supprimée avec succès!');
    }
}