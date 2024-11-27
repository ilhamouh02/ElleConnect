@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des statuts</h2>
    <a href="{{ route('statuses.create') }}" class="btn btn-primary mb-3">Nouveau statut</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Label</th>
                <th>Demande validée</th>
                <th>Demande en cours</th>
                <th>Demande terminée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statuses as $status)
            <tr>
                <td>{{ $status->id_Status }}</td>
                <td>{{ $status->label }}</td>
                <td>{{ $status->demance_Valider ? 'Oui' : 'Non' }}</td>
                <td>{{ $status->demand_en_cours ? 'Oui' : 'Non' }}</td>
                <td>{{ $status->demande_Terminer ? 'Oui' : 'Non' }}</td>
                <td>
                    <a href="{{ route('statuses.show', $status->id_Status) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('statuses.edit', $status->id_Status) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('statuses.destroy', $status->id_Status) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce statut ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
