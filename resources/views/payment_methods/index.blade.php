@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des méthodes de paiement</h2>
    <a href="{{ route('payment_methods.create') }}" class="btn btn-primary mb-3">Nouvelle méthode de paiement</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type de paiement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentMethods as $paymentMethod)
            <tr>
                <td>{{ $paymentMethod->id_Paiement }}</td>
                <td>{{ $paymentMethod->payment_type }}</td>
                <td>
                    <a href="{{ route('payment_methods.show', $paymentMethod->id_Paiement) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('payment_methods.edit', $paymentMethod->id_Paiement) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('payment_methods.destroy', $paymentMethod->id_Paiement) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette méthode de paiement ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
