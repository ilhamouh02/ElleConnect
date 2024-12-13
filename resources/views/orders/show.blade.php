@extends('layouts.app')

@section('content')
    <h1>Détails de la commande</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $order->id_Commande }}</td>
        </tr>
        <tr>
            <th>Date de commande</th>
            <td>{{ $order->date_Commande }}</td>
        </tr>
        <tr>
            <th>Date de paiement</th>
            <td>{{ $order->date_Paiement }}</td>
        </tr>
        <tr>
            <th>Date de livraison</th>
            <td>{{ $order->date_Livraison }}</td>
        </tr>
        <tr>
            <th>Connexion</th>
            <td>{{ $order->id_Connexion }}</td>
        </tr>
        <tr>
            <th>Statut</th>
            <td>{{ $order->status->label }}</td>
        </tr>
        <tr>
            <th>Méthode de paiement</th>
            <td>{{ optional($order->paymentMethod)->payment_type }}</td>

         <td>{{ $order->paymentMethod ? $order->paymentMethod->payment_type : 'N/A' }}</td>
        </tr>
        <tr>
            <th>Utilisateur</th>
            <td>{{ optional($order->user)->nom }}</td>
        </tr>
        <tr>
            <th>Prise</th>
            <td>{{ optional($order->prise)->id_Logement }}</td>

            <td>{{ $order->prise ? $order->prise->id_Logement : 'N/A' }}</td>
        </tr>
    </table>
    <a href="{{ route('orders.index') }}" class="btn btn-primary">Retour à la liste</a>
@endsection