@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de la Méthode de Paiement</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID : {{ $paymentMethod->id_Paiement }}</h5>
            <p class="card-text">Type : {{ $paymentMethod->payment_type }}</p>
        </div>
    </div>
    <a href="{{ route('payment_methods.edit', $paymentMethod->id_Paiement) }}" class="btn btn-warning mt-3">Modifier</a>
    <form action="{{ route('payment_methods.destroy', $paymentMethod->id_Paiement) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
    </form>
</div>
@endsection
