@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter une nouvelle méthode de paiement</h1>
        <form action="{{ route('payment_methods.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="payment_type">Type de paiement</label>
                <input type="text" name="payment_type" id="payment_type" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
        </form>
    </div>
@endsection
