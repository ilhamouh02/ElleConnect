@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Rôles</h2>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">Ajouter un Rôle</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->id_role }}</td>
                <td>{{ $role->label }}</td>
                <td>
                    <a href="{{ route('roles.show', $role->id_role) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('roles.edit', $role->id_role) }}" class="btn btn-warning btn-sm">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
