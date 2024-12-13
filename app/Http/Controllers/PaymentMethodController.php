<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('payment_methods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_Paiement' => 'required|string|unique:payment_methods,id_Paiement',
            'payment_type' => 'required|max:50',
        ]);

        PaymentMethod::create($request->all());

        return redirect()->route('payment_methods.index')
            ->with('success', 'Méthode de paiement créée avec succès.');
    }

    public function show(string $id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('payment_methods.show', compact('paymentMethod'));
    }

    public function edit(string $id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'payment_type' => 'required|max:50',
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->update($request->all());

        return redirect()->route('payment_methods.index')
            ->with('success', 'Méthode de paiement mise à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()->route('payment_methods.index')
            ->with('success', 'Méthode de paiement supprimée avec succès.');
    }
}
