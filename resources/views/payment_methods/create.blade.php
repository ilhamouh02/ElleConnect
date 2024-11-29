@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une Méthode de Paiement</h2>

    <form action="{{ route('payment_methods.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="payment_type">Type de Paiement</label>
            <input type="text" class="form-control" id="payment_type" name="payment_type" required maxlength="50">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Créer</button>
    </form>
</div>
@endsection
