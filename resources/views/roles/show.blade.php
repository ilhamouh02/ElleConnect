@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du rôle</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID du rôle: {{ $role->id_role }}</h5>
            <p class="card-text">Nom du rôle: {{ $role->label }}</p>
        </div>
    </div>
    <a href="{{ route('roles.edit', $role->id_role) }}" class="btn btn-warning mt-3">Modifier</a>
    <form action="{{ route('roles.destroy', $role->id_role) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')">Supprimer</button>
    </form>
</div>
@endsection
