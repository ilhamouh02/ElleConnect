@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Méthodes de Paiement</h2>
    <a href="{{ route('payment_methods.create') }}" class="btn btn-primary mb-3">Ajouter une Méthode de Paiement</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type de Paiement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentMethods as $method)
            <tr>
                <td>{{ $method->id_Paiement }}</td>
                <td>{{ $method->payment_type }}</td>
                <td>
                    <a href="{{ route('payment_methods.show', $method->id_Paiement) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('payment_methods.edit', $method->id_Paiement) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('payment_methods.destroy', $method->id_Paiement) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
        </tbody>
    </table>
</div>
@endsection
