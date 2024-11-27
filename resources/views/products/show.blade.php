@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du produit</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Produit ID: {{ $product->id_Produit }}</h5>
            <p class="card-text"><strong>Prix:</strong> {{ $product->prix_Produit }}</p>
            <p class="card-text"><strong>Visible:</strong> {{ $product->visible ? 'Oui' : 'Non' }}</p>
            <p class="card-text"><strong>Prise:</strong> {{ $product->prise ? 'Oui' : 'Non' }}</p>
        </div>
    </div>
    <a href="{{ route('products.edit', $product->id_Produit) }}" class="btn btn-warning mt-3">Modifier</a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
