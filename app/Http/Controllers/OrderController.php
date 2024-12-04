<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Prise;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Afficher la liste des commandes
    public function index()
    {
        $orders = Order::all();  // Récupère toutes les commandes
        return view('orders.index', compact('orders'));
    }

    // Afficher les détails d'une commande
    public function show($id)
    {
        $order = Order::findOrFail($id); // Trouver la commande par ID
        return view('orders.show', compact('order'));
    }

    // Afficher le formulaire de création d'une commande
    public function create()
    {
        $statuses = Status::all();
        $paymentMethods = PaymentMethod::all();
        $users = User::all();
        $prises = Prise::all();

        return view('orders.create', compact('statuses', 'paymentMethods', 'users', 'prises'));
    }

    // Sauvegarder une nouvelle commande
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_Commande' => 'required|date',
            'date_Paiement' => 'required|date',
            'date_Livraison' => 'required|date',
            'id_Connexion' => 'required|string',
            'password_Connexion' => 'required|string',
            'id_demande' => 'required|exists:status,id_demande',
            'id_Paiement' => 'nullable|exists:payment_methods,id_Paiement',
            'id_utilisateur' => 'required|exists:users,id_utilisateur',
            'id_Prise' => 'nullable|exists:prises,id_Prise'
        ]);
        $order = Order::create($validated);
        
        return redirect()->route('orders.index')->with('success', 'Commande créée avec succès');
    }

    // Afficher le formulaire d'édition d'une commande
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $statuses = Status::all();
        $paymentMethods = PaymentMethod::all();
        $users = User::all();
        $prises = Prise::all();

        return view('orders.edit', compact('order', 'statuses', 'paymentMethods', 'users', 'prises'));
    }

    // Mettre à jour une commande
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'date_Commande' => 'required|date',
            'date_Paiement' => 'required|date',
            'date_Livraison' => 'required|date',
            'id_Connexion' => 'required|string',
            'password_Connexion' => 'required|string',
            'id_demande' => 'required|exists:status,id_demande',
            'id_Paiement' => 'nullable|exists:payment_methods,id_Paiement',
            'id_utilisateur' => 'required|exists:users,id_utilisateur',
            'id_Prise' => 'nullable|exists:prises,id_Prise'
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Commande mise à jour avec succès');
    }

    // Supprimer une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Commande supprimée avec succès');
    }
}
