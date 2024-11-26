@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des méthodes de paiement</h1>
        <a href="{{ route('payment_methods.create') }}" class="btn btn-primary">Ajouter une méthode de paiement</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type de paiement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentMethods as $paymentMethod)
                    <tr>
                        <td>{{ $paymentMethod->id_Paiement }}</td>
                        <td>{{ $paymentMethod->payment_type }}</td>
                        <td>
                            <a href="{{ route('payment_methods.show', $paymentMethod->id_Paiement) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('payment_methods.edit', $paymentMethod->id_Paiement) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('payment_methods.destroy', $paymentMethod->id_Paiement) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
