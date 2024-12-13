@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des logements</h2>
    <a href="{{ route('logements.create') }}" class="btn btn-primary">Ajouter un logement</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de lits</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logements as $logement)
            <tr>
                <td>{{ $logement->id_Logement }}</td>
                <td>{{ $logement->nb_Lit }}</td>
                <td>
                    <a href="{{ route('logements.show', $logement->id_Logement) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('logements.edit', $logement->id_Logement) }}" class="btn btn-warning btn-sm">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection