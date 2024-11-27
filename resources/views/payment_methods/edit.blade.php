@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la méthode de paiement</h2>
    <form action="{{ route('payment_methods.update', $paymentMethod->id_Paiement) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="payment_type">Type de paiement</label>
            <input type="text" class="form-control" id="payment_type" name="payment_type" value="{{ $paymentMethod->payment_type }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
