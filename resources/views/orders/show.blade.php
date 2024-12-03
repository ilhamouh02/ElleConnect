@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Commande #{{ $order->id_Commande }}</h1>
    
    <div class="mb-3">
        <strong>Date de Commande :</strong> {{ $order->date_Commande->format('d/m/Y') }}
    </div>
    <div class="mb-3">
        <strong>Date de Paiement :</strong> {{ $order->date_Paiement ? $order->date_Paiement->format('d/m/Y') : 'Non spécifié' }}
    </div>
    <div class="mb-3">
        <strong>Date de Livraison :</strong> {{ $order->date_Livraison ? $order->date_Livraison->format('d/m/Y') : 'Non spécifié' }}
    </div>
    <div class="mb-3">
        <strong>ID Connexion :</strong> {{ $order->id_Connexion }}
    </div>
    <div class="mb-3">
        <strong>Mot de Passe Connexion :</strong> {{ $order->password_Connexion }}
    </div>
    <div class="mb-3">
        <strong>Statut :</strong> {{ $order->status ? $order->status->nom : 'Non spécifié' }}
    </div>
    <div class="mb-3">
        <strong>Méthode de Paiement :</strong> {{ $order->paymentMethod ? $order->paymentMethod->payment_type : 'Non spécifiée' }}
    </div>
    <div class="mb-3">
        <strong>Prise :</strong> {{ $order->prise ? $order->prise->nom : 'Non spécifiée' }}
    </div>
    <div class="mb-3">
        <strong>Utilisateur :</strong> {{ $order->user ? $order->user->nom : 'Non spécifié' }}
    </div>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Retour à la Liste</a>
    <a href="{{ route('orders.edit', $order->id_Commande) }}" class="btn btn-warning">Modifier</a>

    <form action="{{ route('orders.destroy', $order->id_Commande) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endsection
