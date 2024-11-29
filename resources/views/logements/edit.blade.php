@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le Logement</h2>

    <form action="{{ route('logements.update', $logement->id_Logement) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nb_Lit">Nombre de Lits</label>
            <input type="number" class="form-control" id="nb_Lit" name="nb_Lit" value="{{ $logement->nb_Lit }}" required min="1">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
