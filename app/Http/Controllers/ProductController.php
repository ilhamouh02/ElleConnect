<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Afficher la liste des produits.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer tous les produits de la base de données
        $products = Product::all();
        // Retourner la vue avec les produits
        return view('products.index', compact('products'));
    }

    /**
     * Afficher le formulaire de création d'un produit.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retourner la vue du formulaire de création
        return view('products.create');
    }

    /**
     * Stocker un nouveau produit dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'id_Produit' => 'required|string|max:100|unique:products', // Assurez-vous que la table est 'products' (en minuscule)
            'prix_Produit' => 'required|numeric', // Le prix doit être un nombre
            'visible' => 'required|boolean', // Visible doit être un booléen
            'prise' => 'required|boolean', // Prise doit être un booléen
        ]);

        // Créer un produit avec les données validées
        Product::create($request->all());

        // Rediriger l'utilisateur vers la liste des produits avec un message de succès
        return redirect()->route('products.index')->with('success', 'Produit créé avec succès.');
    }

    /**
     * Afficher les détails d'un produit spécifique.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        // Retourner la vue avec les informations du produit
        return view('products.show', compact('product'));
    }

    /**
     * Afficher le formulaire d'édition d'un produit spécifique.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        // Retourner la vue d'édition avec les informations du produit
        return view('products.edit', compact('product'));
    }

    /**
     * Mettre à jour un produit spécifique dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        // Valider les données de la requête
        $request->validate([
            'prix_Produit' => 'required|numeric', // Le prix doit être un nombre
            'visible' => 'required|boolean', // Visible doit être un booléen
            'prise' => 'required|boolean', // Prise doit être un booléen
        ]);

        // Mettre à jour le produit avec les nouvelles données
        $product->update($request->all());

        // Rediriger l'utilisateur vers la liste des produits avec un message de succès
        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Supprimer un produit spécifique de la base de données.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        // Supprimer le produit
        $product->delete();

        // Rediriger l'utilisateur vers la liste des produits avec un message de succès
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
