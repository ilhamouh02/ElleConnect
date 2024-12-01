@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer un nouveau rôle</h2>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_role">ID du rôle</label>
            <input type="number" class="form-control" id="id_role" name="id_role" required>
        </div>
        <div class="form-group">
            <label for="label">Nom du rôle</label>
            <input type="text" class="form-control" id="label" name="label" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
