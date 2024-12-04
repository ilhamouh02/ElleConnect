@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une nouvelle commande</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date_Commande" class="form-label">Date de Commande</label>
            <input type="date" name="date_Commande" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date_Paiement" class="form-label">Date de Paiement</label>
            <input type="date" name="date_Paiement" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date_Livraison" class="form-label">Date de Livraison</label>
            <input type="date" name="date_Livraison" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_Connexion" class="form-label">ID Connexion</label>
            <input type="text" name="id_Connexion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_Connexion" class="form-label">Mot de Passe Connexion</label>
            <input type="text" name="password_Connexion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_demande" class="form-label">Demande</label>
            <select name="id_demande" class="form-control">
                @foreach($statuses as $status)
                    <option value="{{ $status->id_demande }}">{{ $status->demance_Valider }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_Paiement" class="form-label">Méthode de Paiement</label>
            <select name="id_Paiement" class="form-control">
                @foreach($paymentMethods as $paymentMethod)
                    <option value="{{ $paymentMethod->id_Paiement }}">{{ $paymentMethod->payment_type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_utilisateur" class="form-label">Utilisateur</label>
            <select name="id_utilisateur" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id_utilisateur }}">{{ $user->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_Prise" class="form-label">Prise</label>
            <select name="id_Prise" class="form-control">
                @foreach($prises as $prise)
                    <option value="{{ $prise->id_Prise }}">{{ $prise->id_Logement }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer Commande</button>
    </form>
</div>
@endsection
