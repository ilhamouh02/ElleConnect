@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Rôles</h2>
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Ajouter un Rôle</a>

    <table class="table">
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
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a href="{{ route('roles.show', $role) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

   @if($roles->isEmpty())
       <p>Aucun rôle trouvé.</p>
   @endif 
</div>
@endsection 
