@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le rôle</h2>
    <form action="{{ route('roles.update', $role->id_role) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_role">ID du rôle</label>
            <input type="number" class="form-control" id="id_role" name="id_role" value="{{ $role->id_role }}" readonly>
        </div>
        <div class="form-group">
            <label for="label">Nom du rôle</label>
            <input type="text" class="form-control" id="label" name="label" value="{{ $role->label }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
