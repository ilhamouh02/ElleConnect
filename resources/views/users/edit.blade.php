@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier l'utilisateur : {{ $user->name }}</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required maxlength="255">
        </div>

        <!-- Le champ mot de passe est optionnel lors de la mise à jour -->
        <div class="form-group">
            <label for="password">Mot de passe (laisser vide pour ne pas changer)</label>
            <input type="password" class="form-control" id="password" name="password" minlength=8 placeholder="">
        </div>

        <!-- Confirmation du mot de passe -->
        <div class="form-group">
            <label for "password_confirmation">Confirmer le mot de passe (laisser vide pour ne pas changer)</label>
            <input type "password" class "form-control" id "password_confirmation" name "password_confirmation"
                   placeholder="">
        </div>

        <!-- Ajoutez d'autres champs selon vos besoins -->

        <button type "submit" class "btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
