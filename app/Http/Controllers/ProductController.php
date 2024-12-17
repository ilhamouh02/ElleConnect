<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Contrôleur pour gérer les produits.
 */
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
            'id_Produit' => 'required|string', // Identifiant du produit requis et chaîne de caractères
            'prix_Produit' => 'required|numeric', // Prix du produit requis et numérique
            'visible' => 'nullable|boolean', // Visibilité du produit optionnelle et booléenne
            'prise' => 'nullable|boolean', // Prise du produit optionnelle et booléenne
        ]);

        // Créer un nouveau produit
        $product = new Product();
        $product->id_Produit = $request->input('id_Produit');
        $product->prix_Produit = $request->input('prix_Produit');
        $product->visible = $request->has('visible') ? true : false; // Définir la visibilité selon la présence du champ dans la requête
        $product->prise = $request->has('prise') ? true : false; // Définir la prise selon la présence du champ dans la requête
        $product->save();

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
        ]);

        // Exclure les champs _token et _method de la mise à jour
        $data = $request->except(['_token', '_method']);

        // Définir les valeurs des champs visible et prise
        $data['visible'] = $request->has('visible') ? true : false; // Définir la visibilité selon la présence du champ dans la requête
        $data['prise'] = $request->has('prise') ? true : false; // Définir la prise selon la présence du champ dans la requête

        // Mettre à jour le produit avec l'ID spécifique
        $product->update($data);

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
        // Supprimer le produit avec l'ID spécifique
        Product::where('id_Produit', $product->id_Produit)->delete();

        // Rediriger l'utilisateur vers la liste des produits avec un message de succès
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
