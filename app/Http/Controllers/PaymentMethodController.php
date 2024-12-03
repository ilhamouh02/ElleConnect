<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\PaymentMethod; // Assurez-vous que le modèle PaymentMethod existe et est correctement défini.
>>>>>>> 3efa5ca49edaf7603383c5dfb3c3861213f0f0af
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $paymentMethods = PaymentMethod::all(); // Récupère tous les enregistrements
    return view('payment_methods.index', compact('paymentMethods'));
    //     $paymentMethods = PaymentMethod::all();
    //     return view('payment_methods.index', compact('paymentMethods'));
    
    // $paymentMethods = DB::table('payment_methods')->get(); // Vérifie si id_Paiement est récupéré correctement
    // return view('payment_methods.index', compact('paymentMethods'));
=======
        $paymentMethods = PaymentMethod::all(); // Récupère toutes les méthodes de paiement.
        return view('payment_methods.index', compact('paymentMethods')); // Retourne la vue avec les méthodes de paiement.
>>>>>>> 3efa5ca49edaf7603383c5dfb3c3861213f0f0af
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        return view('payment_methods.create');
=======
        return view('payment_methods.create'); // Affiche le formulaire de création pour les méthodes de paiement.
>>>>>>> 3efa5ca49edaf7603383c5dfb3c3861213f0f0af
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
<<<<<<< HEAD
            'id_Paiement' => 'required|string|unique:payment_methods',
            'payment_type' => 'required|max:255',
        ]);

        PaymentMethod::create($request->all());

        return redirect()->route('payment_methods.index')
            ->with('success', 'Méthode de paiement créée avec succès.');
    }

    public function show(string $id)
    {
        $paymentMethod = PaymentMethod::find($id);
        return view('payment_methods.show', compact('paymentMethod'));
    }

    public function edit(string $id)
    {
        $paymentMethod = PaymentMethod::find($id);
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'payment_type' => 'required|max:255',
        ]);

        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->update($request->all());

        return redirect()->route('payment_methods.index')
            ->with('success', 'Méthode de paiement mise à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->delete();

        return redirect()->route('payment_methods.index')
            ->with('success', 'Méthode de paiement supprimée avec succès');
=======
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
>>>>>>> 3efa5ca49edaf7603383c5dfb3c3861213f0f0af
    }
}
