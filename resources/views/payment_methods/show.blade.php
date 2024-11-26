@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de la méthode de paiement</h1>
        <p><strong>ID:</strong> {{ $paymentMethod->id_Paiement }}</p>
        <p><strong>Type de paiement:</strong> {{ $paymentMethod->payment_type }}</p>
        <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
@endsection
