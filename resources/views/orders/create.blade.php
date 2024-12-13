@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle commande</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date_Commande" class="form-label">Date de commande</label>
            <input type="date" name="date_Commande" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date_Paiement" class="form-label">Date de paiement</label>
            <input type="date" name="date_Paiement" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date_Livraison" class="form-label">Date de livraison</label>
            <input type="date" name="date_Livraison" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_Connexion" class="form-label">Connexion</label>
            <input type="text" name="id_Connexion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_Connexion" class="form-label">Mot de passe de connexion</label>
            <input type="password" name="password_Connexion" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="id_Paiement" class="form-label">Méthode de paiement</label>
            <select name="id_Paiement" class="form-control">
                @foreach($paymentMethods as $paymentMethod)
                    <option value="{{ $paymentMethod->id_Paiement }}">{{ $paymentMethod->payment_type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_utilisateur" class="form-label">Utilisateur</label>
            <select name="id_utilisateur" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection