<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\PaymentMethod;
use App\Models\Prise;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Afficher toutes les commandes
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // Afficher le formulaire de création d'une commande
    public function create()
    {
        $statuses = Status::all(); // Récupère toutes les statuts
        $paymentMethods = PaymentMethod::all(); // Récupère toutes les méthodes de paiement
        $prises = Prise::all(); // Récupère toutes les prises
        $users = User::all(); // Récupère tous les utilisateurs
        
        return view('orders.create', compact('statuses', 'paymentMethods', 'prises', 'users'));
    }

    // Sauvegarder une nouvelle commande
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'date_Commande' => 'required|date',
            'id_Connexion' => 'required|string|max:100',
            'password_Connexion' => 'required|string|max:255',
            'id_Status' => 'required|exists:statuses,id_Status',
            'id_Paiement' => 'nullable|exists:payment_methods,id_Paiement',
            'id_Prise' => 'nullable|exists:prises,id_Prise',
            'id_utilisateur' => 'required|exists:users,id_utilisateur',
        ]);

        // Créer la commande dans la base de données
        Order::create($request->all());

        // Rediriger vers la liste des commandes avec un message de succès
        return redirect()->route('orders.index')->with('success', 'Commande créée avec succès.');
    }

    // Afficher une commande spécifique
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Afficher le formulaire d'édition d'une commande
    public function edit(Order $order)
    {
        // Récupérer les données nécessaires pour l'édition
        $statuses = Status::all(); 
        $paymentMethods = PaymentMethod::all(); 
        $prises = Prise::all(); 
        $users = User::all(); 

        return view('orders.edit', compact('order', 'statuses', 'paymentMethods', 'prises', 'users'));
    }

    // Mettre à jour une commande
    public function update(Request $request, Order $order)
    {
        // Validation des données du formulaire
        $request->validate([
            'date_Commande' => 'required|date',
            'id_Connexion' => 'required|string|max:100',
            'password_Connexion' => 'required|string|max:255',
            'id_Status' => 'required|exists:statuses,id_Status',
            'id_Paiement' => 'nullable|exists:payment_methods,id_Paiement',
            'id_Prise' => 'nullable|exists:prises,id_Prise',
            'id_utilisateur' => 'required|exists:users,id_utilisateur',
        ]);

        // Mettre à jour la commande avec les nouvelles données
        $order->update($request->all());

        // Rediriger vers la liste des commandes avec un message de succès
        return redirect()->route('orders.index')->with('success', 'Commande mise à jour avec succès.');
    }

    // Supprimer une commande
    public function destroy(Order $order)
    {
        // Supprimer la commande
        $order->delete();

        // Rediriger vers la liste des commandes avec un message de succès
        return redirect()->route('orders.index')->with('success', 'Commande supprimée avec succès.');
    }
}
