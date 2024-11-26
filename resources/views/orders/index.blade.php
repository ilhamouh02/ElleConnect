@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create New Order</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date Commande</th>
                <th>Date Paiement</th>
                <th>Date Livraison</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->date_Commande }}</td>
                <td>{{ $order->date_Paiement }}</td>
                <td>{{ $order->date_Livraison }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
