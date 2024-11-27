@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Créer une nouvelle commande</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="date_Commande" class="form-label">Date de commande</label>
                            <input type="date" class="form-control" id="date_Commande" name="date_Commande" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_Paiement" class="form-label">Date de paiement</label>
                            <input type="date" class="form-control" id="date_Paiement" name="date_Paiement">
                        </div>
                        <div class="mb-3">
                            <label for="date_Livraison" class="form-label">Date de livraison</label>
                            <input type="date" class="form-control" id="date_Livraison" name="date_Livraison">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary me-md-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
