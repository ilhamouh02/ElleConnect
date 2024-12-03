@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une Commande</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date_Commande">Date de Commande</label>
            <input type="date" name="date_Commande" id="date_Commande" class="form-control" required>
        </div>
        <!-- <div class="form-group">
            <label for="id_Connexion">ID Connexion</label>
            <input type="text" name="id_Connexion" id="id_Connexion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_Connexion">Mot de passe Connexion</label>
            <input type="password" name="password_Connexion" id="password_Connexion" class="form-control" required>
        </div> -->
        <div class="form-group">
            <label for="id_Status">Statut</label>
            <select name="id_Status" id="id_Status" class="form-control">
                @foreach($statuses as $status)
                    <option value="{{ $status->id_Status }}">{{ $status->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_Paiement">Méthode de Paiement</label>
            <select name="id_Paiement" id="id_Paiement" class="form-control">
                @foreach($paymentMethods as $paymentMethod)
                    <option value="{{ $paymentMethod->id_Paiement }}">{{ $paymentMethod->payment_type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_Prise">Prise</label>
            <select name="id_Prise" id="id_Prise" class="form-control">
                @foreach($prises as $prise)
                    <option value="{{ $prise->id_Prise }}">{{ $prise->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_utilisateur">Utilisateur</label>
            <select name="id_utilisateur" id="id_utilisateur" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id_utilisateur }}">{{ $user->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer Commande</button>
    </form>
</div>
@endsection
