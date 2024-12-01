@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Logements</h2>
    <a href="{{ route('logements.create') }}" class="btn btn-primary">Ajouter un Logement</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Lits</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logements as $logement)
            <tr>
                <td>{{ $logement->id_Logement }}</td>
                <td>{{ $logement->nb_Lit }}</td>
                <td>
<<<<<<< HEAD
                    <a href="{{ route('logements.show', ['logement' => $logement->id_Logement]) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('logements.edit', ['logement' => $logement->id_Logement]) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('logements.destroy', ['logement' => $logement->id_Logement]) }}" method="POST" style="display: inline-block;">
=======
                    <a href="{{ route('logements.show', $logement->id_Logement) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('logements.edit', $logement->id_Logement) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('logements.destroy', $logement->id_Logement) }}" method="POST" style="display:inline;">
>>>>>>> d4278f523441b9c35de155d30ffd5e3687634b6e
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce logement ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection