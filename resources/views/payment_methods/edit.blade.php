@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la méthode de paiement</h1>
        <form action="{{ route('payment_methods.update', $paymentMethod->id_Paiement) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="payment_type">Type de paiement</label>
                <input type="text" name="payment_type" id="payment_type" class="form-control" value="{{ $paymentMethod->payment_type }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
        </form>
    </div>
@endsection
