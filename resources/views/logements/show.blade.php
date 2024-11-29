@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Détails du Logement</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID Logement: {{ $logement->id_Logement }}</h5>
            <p class="card-text">Nombre de Lits: {{ $logement->nb_Lit }}</p>
        </div>
    </div>
</div>
@endsection