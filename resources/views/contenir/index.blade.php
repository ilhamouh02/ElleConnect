@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des contenus</h2>
    <a href="{{ route('contenirs.create') }}" class="btn btn-primary mb-3">Ajouter un contenu</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID Produit</th>
                <th>ID Commande</th>
                <th>Prix Produit</th>
                <th>Nom Produit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contenirs as $contenir)
            <tr>
                <td>{{ $contenir->id_Produit }}</td>
                <td>{{ $contenir->id_Commande }}</td>
                <td>{{ $contenir->prix_Produit }}</td>
                <td>{{ $contenir->nom_Produit }}</td>
                <td>
                    <a href="{{ route('contenirs.show', [$contenir->id_Produit, $contenir->id_Commande]) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('contenirs.edit', [$contenir->id_Produit, $contenir->id_Commande]) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('contenirs.destroy', [$contenir->id_Produit, $contenir->id_Commande]) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
