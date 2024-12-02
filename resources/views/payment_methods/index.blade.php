@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Méthodes de Paiement</h2>
    <a href="{{ route('payment_methods.create') }}" class="btn btn-primary">Ajouter une Méthode de Paiement</a>
    <table class="table mt-3">
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
    <td>{{ $method->id_Paiement  }}</td>
    <td>{{ $method->payment_type }}</td>
    <td>
        {{ var_dump($method) }}
        <a href="{{ route('payment_methods.show', $method->id_Paiement ?? 'null') }}" class="btn btn-info btn-sm">Voir</a>
        <a href="{{ route('payment_methods.edit', $method->id_Paiement ?? 'null') }}" class="btn btn-warning btn-sm">Modifier</a>
    </td>
</tr>
@endforeach


        </tbody>
    </table>
</div>
@endsection
