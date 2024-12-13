@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer un nouveau logement</h2>
    <form action="{{ route('logements.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_Logement">ID du logement</label>
            <input type="text" class="form-control" id="id_Logement" name="id_Logement" required>
        </div>
        <div class="form-group">
            <label for="nb_Lit">Nombre de lits</label>
            <input type="number" class="form-control" id="nb_Lit" name="nb_Lit" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection