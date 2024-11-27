@extends('layouts.app')

@section('content')
<div class="container">
<h2>Ajouter un Nouveau Rôle</h2>

<form action="{{ route('roles.store') }}" method="POST">
@csrf

<div class="form-group">
<label for="name">Nom du Rôle</label>
<input type="text" class="form-control" id="name" name="name" required maxlength="255">
</div>

<button type="submit" class="btn btn-primary mt-3">Créer</button>

</form>

</div> 
@endsection 
