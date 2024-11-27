@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le contenu</h2>
    <form action="{{ route('contenirs.update', [$contenir->id_Produit, $contenir->id_Commande]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="prix_Produit">Prix Produit</label>
            <input type="number" step="0.01" class="form-control" id="prix_Produit" name="prix_Produit" value="{{ $contenir->prix_Produit }}" required>
        </div>

        <div class="form-group">
            <label for="nom_Produit">Nom Produit</label>
            <input type="text" class="form-control" id="nom_Produit" name="nom_Produit" value="{{ $contenir->nom_Produit }}" required maxlength="100">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
