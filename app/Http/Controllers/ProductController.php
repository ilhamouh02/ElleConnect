<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Afficher tous les produits (Index)
    public function index()
    {
        $products = Product::all(); // Récupère tous les produits
        return view('Products.index', compact('products'));
    }

    // Afficher le formulaire de création (Create)
    public function create()
    {
        return view('Products.create');
    }

    // Enregistrer un nouveau produit (Store)
    public function store(Request $request)
    {
        // Valider les données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Créer le produit
        Product::create($validatedData);

        return redirect()->route('Products.index')->with('success', 'Produit créé avec succès !');
    }

    // Afficher un produit spécifique (Show)
    public function show(Product $product)
    {
        return view('Products.show', compact('product'));
    }

    // Afficher le formulaire d'édition (Edit)
    public function edit(Product $product)
    {
        return view('Products.edit', compact('product'));
    }

    // Mettre à jour un produit (Update)
    public function update(Request $request, Product $product)
    {
        // Valider les données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Mettre à jour le produit
        $product->update($validatedData);

        return redirect()->route('Products.index')->with('success', 'Produit mis à jour avec succès !');
    }

    // Supprimer un produit (Destroy)
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('Products.index')->with('success', 'Produit supprimé avec succès !');
    }
}