<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

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
            'payment_type' => 'required|string|max:50',
        ]);

        PaymentMethod::create($request->all());

        return redirect()->route('payment_methods.index')->with('success', 'Méthode de paiement créée avec succès.');
    }

    public function show(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.show', compact('paymentMethod'));
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $request->validate([
            'payment_type' => 'required|string|max:50',
        ]);

        $paymentMethod->update($request->all());

        return redirect()->route('payment_methods.index')->with('success', 'Méthode de paiement mise à jour avec succès.');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        return redirect()->route('payment_methods.index')->with('success', 'Méthode de paiement supprimée avec succès.');
    }
}
