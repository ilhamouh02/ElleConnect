@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Modifier un Logement</h2>

    <form action="{{ route('logements.update', ['logement' => $logement->id_Logement]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_Logement">ID Logement</label>
            <input type="text" class="form-control" id="id_Logement" name="id_Logement" value="{{ $logement->id_Logement }}" required readonly>
        </div>
        <div class="form-group">
            <label for="nb_Lit">Nombre de Lits</label>
            <input type="number" class="form-control" id="nb_Lit" name="nb_Lit" value="{{ $logement->nb_Lit }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection