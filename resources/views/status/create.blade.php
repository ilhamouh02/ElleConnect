@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Status</h1>
    <form action="{{ route('statuses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="label" class="form-label">Label</label>
            <input type="text" class="form-control" id="label" name="label" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="demance_Valider" name="demance_Valider">
            <label class="form-check-label" for="demance_Valider">Demande Validée</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="demand_en_cours" name="demand_en_cours">
            <label class="form-check-label" for="demand_en_cours">Demande En Cours</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="demande_Terminer" name="demande_Terminer">
            <label class="form-check-label" for="demande_Terminer">Demande Terminée</label>
        </div>
        <button type="submit" class="btn btn-primary">Create Status</button>
    </form>
</div>
@endsection
