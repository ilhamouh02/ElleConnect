@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la Méthode de Paiement</h2>
    <form action="{{ route('payment_methods.update', $paymentMethod->id_Paiement) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_Paiement">ID de la Méthode de Paiement</label>
            <input type="text" class="form-control" id="id_Paiement" name="id_Paiement" value="{{ $paymentMethod->id_Paiement }}" readonly>
        </div>
        <div class="form-group">
            <label for="payment_type">Type de Paiement</label>
            <input type="text" class="form-control" id="payment_type" name="payment_type" value="{{ $paymentMethod->payment_type }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
