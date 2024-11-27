@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du statut</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $status->label }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $status->id_Status }}</p>
            <p class="card-text"><strong>Demande validée:</strong> {{ $status->demance_Valider ? 'Oui' : 'Non' }}</p>
            <p class="card-text"><strong>Demande en cours:</strong> {{ $status->demand_en_cours ? 'Oui' : 'Non' }}</p>
            <p class="card-text"><strong>Demande terminée:</strong> {{ $status->demande_Terminer ? 'Oui' : 'Non' }}</p>
        </div>
    </div>
    <a href="{{ route('statuses.edit', $status->id_Status) }}" class="btn btn-warning mt-3">Modifier</a>
    <a href="{{ route('statuses.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
