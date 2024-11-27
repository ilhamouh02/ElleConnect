@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Détails de la commande</h2>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">ID</dt>
                        <dd class="col-sm-8">{{ $order->id }}</dd>

                        <dt class="col-sm-4">Date de commande</dt>
                        <dd class="col-sm-8">{{ $order->date_Commande }}</dd>

                        <dt class="col-sm-4">Date de paiement</dt>
                        <dd class="col-sm-8">{{ $order->date_Paiement ?? 'Non payé' }}</dd>

                        <dt class="col-sm-4">Date de livraison</dt>
                        <dd class="col-sm-8">{{ $order->date_Livraison ?? 'Non livré' }}</dd>
                    </dl>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary me-md-2">Retour</a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning me-md-2">Modifier</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
