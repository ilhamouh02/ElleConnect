@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des produits</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Nouveau produit</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prix</th>
                <th>Visible</th>
                <th>Prise</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id_Produit }}</td>
                <td>{{ $product->prix_Produit }}</td>
                <td>{{ $product->visible ? 'Oui' : 'Non' }}</td>
                <td>{{ $product->prise ? 'Oui' : 'Non' }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id_Produit) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('products.edit', $product->id_Produit) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('products.destroy', $product->id_Produit) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
