@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un Logement</h2>

    <form action="{{ route('logements.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nb_Lit">Nombre de Lits</label>
            <input type="number" class="form-control" id="nb_Lit" name="nb_Lit" required min="1">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Créer</button>
    </form>
</div>
@endsection
