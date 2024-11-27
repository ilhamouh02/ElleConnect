@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de la méthode de paiement</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $paymentMethod->payment_type }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $paymentMethod->id_Paiement }}</p>
        </div>
    </div>
    <a href="{{ route('payment_methods.edit', $paymentMethod->id_Paiement) }}" class="btn btn-warning mt-3">Modifier</a>
    <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
