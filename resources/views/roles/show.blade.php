@extends('layouts.app')

@section('content')
<div class="container">
<h2>Détails du Rôle : {{ $role->name }}</h2>

<div class="card">
<div class="card-body">

<h5 class="card-title">{{ $role->name }}</h5>

<!-- Ajoutez d'autres informations si nécessaire -->
</div> 
</div>

<a href="{{ route('roles.edit', $role) }}" class="btn btn-warning mt-3">Modifier</a> 
<a href="{{ route('roles.index') }}" class="btn btn-secondary mt-3">Retour à la Liste</a> 

</div> 
@endsection 
