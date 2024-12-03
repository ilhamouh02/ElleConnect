@extends('layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
    <h2 class="text-center mb-4">Détails du Logement</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID Logement: {{ $logement->id_Logement }}</h5>
            <p class="card-text">Nombre de Lits: {{ $logement->nb_Lit }}</p>
        </div>
    </div>
</div>
@endsection
=======
    <h2>Détails du Logement</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">ID du Logement: {{ $logement->id_Logement }}</h5>
            <p class="card-text">Nombre de Lits: {{ $logement->nb_Lit }}</p>

            <!-- Actions -->
            <a href="{{ route('logements.edit', $logement->id_Logement) }}" class="btn btn-warning">Modifier</a>

            <!-- Formulaire de suppression -->
            <form action="{{ route('logements.destroy', $logement->id_Logement) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce logement ?')">Supprimer</button>
            </form>

            <!-- Retour à la liste -->
            <a href="{{ route('logements.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
>>>>>>> d4278f523441b9c35de155d30ffd5e3687634b6e
