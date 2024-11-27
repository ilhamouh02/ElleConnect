@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer une nouvelle méthode de paiement</h2>
    <form action="{{ route('payment_methods.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="payment_type">Type de paiement</label>
            <input type="text" class="form-control" id="payment_type" name="payment_type" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
