@extends('layouts.app')

@section('content')
<div class "container">
    <h2>Détails de l'utilisateur : {{ $user->name }}</h2>

    <!-- Affichage des informations de l'utilisateur -->
    <div class "card">
        <div class "card-body">
            <h5 class "card-title">{{ $user->name }}</h5>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Prénom:</strong> {{ $user->first_name }}</p>
            <p><strong>Nom de famille:</strong> {{ $user->last_name }}</p>

            <!-- Affichage du rôle si disponible -->
            @if($user->role)
                <p><strong>Rôle:</strong> {{ $user->role->name }}</p>
            @else
                <p><strong>Rôle:</strong> N/A</p>
            @endif

            <!-- Ajoutez d'autres informations si nécessaire -->
        </div>
    </div>

    <!-- Boutons d'action -->
    <a href="{{ route('users.edit', $user->id) }}" class "btn btn-warning mt-3">Modifier</a>
    <a href="{{ route('users.index') }}" class "btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
