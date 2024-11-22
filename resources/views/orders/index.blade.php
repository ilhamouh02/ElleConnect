@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des paiements</h1>
    <a href="{{ route('accountant.create') }}" class="btn btn-primary mb-3">Ajouter un paiement</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Étudiant</th>
                <th>Montant</th>
                <th>Méthode de paiement</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->user->name }}</td>
                <td>{{ $payment->montant }}</td>
                <td>{{ $payment->payment_type }}</td>
                <td>{{ $payment->created_at }}</td>
                <td>
                    <a href="{{ route('accountant.show', $payment->id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('accountant.edit', $payment->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('accountant.destroy', $payment->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
