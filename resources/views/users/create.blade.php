@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un nouvel utilisateur</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required minlength="8">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required minlength="8">
        </div>

        <div class="form-group">
            <label for="first_name">Prénom</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
        </div>

        <div class="form-group">
            <label for="last_name">Nom de famille</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
        </div>

        <!-- Ajoutez d'autres champs selon vos besoins -->

        <button type="submit" class="btn btn-primary mt-3">Créer</button>
    </form>
</div>
@endsection
