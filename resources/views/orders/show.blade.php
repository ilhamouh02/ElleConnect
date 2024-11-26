@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <div class="mb-3">
        <strong>ID:</strong> {{ $order->id }}
    </div>
    <div class="mb-3">
        <strong>Date Commande:</strong> {{ $order->date_Commande }}
    </div>
    <div class="mb-3">
        <strong>Date Paiement:</strong> {{ $order->date_Paiement }}
    </div>
    <div class="mb-3">
        <strong>Date Livraison:</strong> {{ $order->date_Livraison }}
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>
@endsection
