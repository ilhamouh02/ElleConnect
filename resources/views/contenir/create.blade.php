@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un nouveau contenu</h2>
    <form action="{{ route('contenirs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_Produit">ID Produit</label>
            <select class="form-control" id="id_Produit" name="id_Produit" required>
                @foreach($products as $product)
                    <option value="{{ $product->id_Produit }}">{{ $product->id_Produit }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_Commande">ID Commande</label>
            <select class="form-control" id="id_Commande" name="id_Commande" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id_Commande }}">{{ $order->id_Commande }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="prix_Produit">Prix Produit</label>
            <input type="number" step="0.01" class="form-control" id="prix_Produit" name="prix_Produit" required>
        </div>

        <div class="form-group">
            <label for="nom_Produit">Nom Produit</label>
            <input type="text" class="form-control" id="nom_Produit" name="nom_Produit" required maxlength="100">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
    </form>
</div>
@endsection
