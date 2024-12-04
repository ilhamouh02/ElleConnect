@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Commande #{{ $order->id_Commande }}</h1>

    <p><strong>Date Commande:</strong> {{ $order->date_Commande }}</p>
    <p><strong>Date Paiement:</strong> {{ $order->date_Paiement }}</p>
    <p><strong>Date Livraison:</strong> {{ $order->date_Livraison }}</p>
    <p><strong>ID Connexion:</strong> {{ $order->id_Connexion }}</p>
    <p><strong>ID Demande:</strong> {{ $order->status->demance_Valider }}</p>
    <!-- <p><strong>Utilisateur:</strong> {{ $order->user->id_utilisateur }}</p> -->
    <p><strong>Prise:</strong> {{ $order->prise->id_Logement }}</p>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
