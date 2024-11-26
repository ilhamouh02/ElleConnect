@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="date_Commande" class="form-label">Date Commande</label>
            <input type="date" id="date_Commande" name="date_Commande" class="form-control" value="{{ $order->date_Commande }}" required>
        </div>
        <div class="mb-3">
            <label for="date_Paiement" class="form-label">Date Paiement</label>
            <input type="date" id="date_Paiement" name="date_Paiement" class="form-control" value="{{ $order->date_Paiement }}">
        </div>
        <div class="mb-3">
            <label for="date_Livraison" class="form-label">Date Livraison</label>
            <input type="date" id="date_Livraison" name="date_Livraison" class="form-control" value="{{ $order->date_Livraison }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
