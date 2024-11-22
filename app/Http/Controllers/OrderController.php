<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Liste toutes les commandes avec relations
        $orders = Order::with(['user', 'status'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // Formulaire pour créer une commande
        $users = User::all(); // Tous les clients
        $statuses = Status::all(); // Tous les statuts
        $products = Product::all(); // Tous les produits
        return view('orders.create', compact('users', 'statuses', 'products'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'total_price' => 'required|numeric',
            'products' => 'required|array', // Les produits commandés
            'products.*.id' => 'exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Création de la commande
        $order = Order::create([
            'user_id' => $request->user_id,
            'status_id' => $request->status_id,
            'total_price' => $request->total_price,
        ]);

        // Ajout des produits associés (relation pivot)
        foreach ($request->products as $product) {
            $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
        }

        return redirect()->route('orders.index')->with('success', 'Commande créée avec succès.');
    }

    public function show(Order $order)
    {
        // Afficher les détails d'une commande
        $order->load(['user', 'status', 'products']);
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        // Formulaire de modification
        $users = User::all();
        $statuses = Status::all();
        $products = Product::all();
        $order->load('products'); // Charger les produits existants
        return view('orders.edit', compact('order', 'users', 'statuses', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        // Validation des données
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'total_price' => 'required|numeric',
            'products' => 'required|array',
            'products.*.id' => 'exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Mise à jour de la commande
        $order->update([
            'user_id' => $request->user_id,
            'status_id' => $request->status_id,
            'total_price' => $request->total_price,
        ]);

        // Mise à jour des produits associés
        $order->products()->detach();
        foreach ($request->products as $product) {
            $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
        }

        return redirect()->route('orders.index')->with('success', 'Commande mise à jour avec succès.');
    }

    public function destroy(Order $order)
    {
        // Suppression d'une commande
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Commande supprimée avec succès.');
    }
}
