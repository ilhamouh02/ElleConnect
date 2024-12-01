<!-- resources/views/payment_methods/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Méthode de Paiement</h1>

    <form action="{{ route('payment_methods.update', $paymentMethod->id_Paiement) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="payment_type">Type de Paiement</label>
            <input type="text" name="payment_type" id="payment_type" value="{{ old('payment_type', $paymentMethod->payment_type) }}" class="form-control" required maxlength="50">
            @error('payment_type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
