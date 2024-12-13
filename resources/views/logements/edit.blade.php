@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le logement</h2>
    <form action="{{ route('logements.update', $logement->id_Logement) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_Logement">ID du logement</label>
            <input type="text" class="form-control" id="id_Logement" name="id_Logement" value="{{ $logement->id_Logement }}" readonly>
        </div>
        <div class="form-group">
            <label for="nb_Lit">Nombre de lits</label>
            <input type="number" class="form-control" id="nb_Lit" name="nb_Lit" value="{{ $logement->nb_Lit }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection