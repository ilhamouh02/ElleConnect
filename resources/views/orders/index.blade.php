@extends('layouts.app')

@section('content')
    <h1>Liste des commandes</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Ajouter une commande</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date de commande</th>
                <th>Date de paiement</th>
                <th>Date de livraison</th>
                <th>Connexion</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id_Commande }}</td>
                    <td>{{ $order->date_Commande }}</td>
                    <td>{{ $order->date_Paiement }}</td>
                    <td>{{ $order->date_Livraison }}</td>
                    <td>{{ $order->id_Connexion }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id_Commande) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('orders.edit', $order->id_Commande) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('orders.destroy', $order->id_Commande) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection