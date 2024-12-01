<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod; // Assurez-vous que le modèle PaymentMethod existe et est correctement défini.
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all(); // Récupère toutes les méthodes de paiement.
        return view('payment_methods.index', compact('paymentMethods')); // Retourne la vue avec les méthodes de paiement.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment_methods.create'); // Affiche le formulaire de création pour les méthodes de paiement.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_Paiement' => 'required|string|max:100|unique:Elle_payment_methods,id_Paiement', // Validation pour id_Paiement.
            'payment_type' => 'required|string|max:255', // Validation pour payment_type.
        ]);

        // Crée une nouvelle méthode de paiement avec les données validées.
        PaymentMethod::create($request->only(['id_Paiement', 'payment_type']));

        return redirect()->route('payment_methods.index')->with('success', 'Méthode de paiement créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.show', compact('paymentMethod')); // Retourne les détails de la méthode de paiement.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.edit', compact('paymentMethod')); // Affiche le formulaire d'édition de la méthode de paiement.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $request->validate([
            'payment_type' => 'required|string|max:255', // Validation pour payment_type lors de la mise à jour.
        ]);

        // Met à jour la méthode de paiement avec les nouvelles données.
        $paymentMethod->update($request->only(['payment_type']));

        return redirect()->route('payment_methods.index')->with('success', 'Méthode de paiement mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete(); // Supprime la méthode de paiement.

        return redirect()->route('payment_methods.index')->with('success', 'Méthode de paiement supprimée avec succès.');
    }
}
