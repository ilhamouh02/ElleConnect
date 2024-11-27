@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du contenu</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID Produit: {{ $contenir->id_Produit }}</h5>
            <p class="card-text"><strong>ID Commande:</strong> {{ $contenir->id_Commande }}</p>
            <p class="card-text"><strong>Prix Produit:</strong> {{ $contenir->prix_Produit }}</p>
            <p class="card-text"><strong>Nom Produit:</strong> {{ $contenir->nom_Produit }}</p>
        </div>
    </div>

    <a href="{{ route('contenirs.edit', [$contenir->id_Produit, $contenir->id_Commande]) }}" class="btn btn-warning mt-3">Modifier</a>
    <a href="{{ route('contenirs.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
