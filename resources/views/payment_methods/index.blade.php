@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Méthodes de Paiement</h1>

    <a href="{{ route('payment_methods.create') }}" class="btn btn-primary">Ajouter une Méthode de Paiement</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                        <a href="{{ route('payment_methods.show', $method->id_Paiement) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('payment_methods.edit', $method->id_Paiement) }}" class="btn btn-warning">Modifier</a>

                        <form action="{{ route('payment_methods.destroy', $method->id_Paiement) }}" method="POST" style="display:inline;">
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
