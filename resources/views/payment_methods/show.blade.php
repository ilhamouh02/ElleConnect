<!-- resources/views/payment_methods/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Méthode de Paiement</h1>

    <p><strong>ID:</strong> {{ $paymentMethod->id_Paiement }}</p>
    <p><strong>Type de Paiement:</strong> {{ $paymentMethod->payment_type }}</p>

    <a href="{{ route('payment_methods.edit', $paymentMethod->id_Paiement) }}" class="btn btn-warning">Modifier</a>
    
    <form action="{{ route('payment_methods.destroy', $paymentMethod->id_Paiement) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>

    <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Retour à la Liste</a>
</div>
@endsection
