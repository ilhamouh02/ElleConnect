<?php

namespace App\Http\Controllers;

use App\Models\Contenir;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class ContenirController extends Controller
{
    public function index()
    {
        $contenirs = Contenir::with(['product', 'order'])->get();
        return view('contenirs.index', compact('contenirs'));
    }

    public function create()
    {
        $products = Product::all();
        $orders = Order::all();
        return view('contenirs.create', compact('products', 'orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_Produit' => 'required|exists:Products,id_Produit',
            'id_Commande' => 'required|exists:orders,id_Commande',
            'prix_Produit' => 'required|numeric',
            'nom_Produit' => 'required|string|max:100',
        ]);

        Contenir::create($request->all());

        return redirect()->route('contenirs.index')->with('success', 'Contenu ajouté avec succès.');
    }

    public function show(Contenir $contenir)
    {
        return view('contenirs.show', compact('contenir'));
    }

    public function edit(Contenir $contenir)
    {
        $products = Product::all();
        $orders = Order::all();
        return view('contenirs.edit', compact('contenir', 'products', 'orders'));
    }

    public function update(Request $request, Contenir $contenir)
    {
        $request->validate([
            'prix_Produit' => 'required|numeric',
            'nom_Produit' => 'required|string|max:100',
        ]);

        $contenir->update($request->all());

        return redirect()->route('contenirs.index')->with('success', 'Contenu mis à jour avec succès.');
    }

    public function destroy(Contenir $contenir)
    {
        $contenir->delete();

        return redirect()->route('contenirs.index')->with('success', 'Contenu supprimé avec succès.');
    }
}
