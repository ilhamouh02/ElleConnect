@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du logement</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID du logement: {{ $logement->id_Logement }}</h5>
            <p class="card-text">Nombre de lits: {{ $logement->nb_Lit }}</p>
        </div>
    </div>
    <a href="{{ route('logements.edit', $logement->id_Logement) }}" class="btn btn-warning mt-3">Modifier</a>
    <form action="{{ route('logements.destroy', $logement->id_Logement) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce logement ?')">Supprimer</button>
    </form>
</div>
@endsection