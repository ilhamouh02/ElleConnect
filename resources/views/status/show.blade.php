@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Status Details</h1>
    <p><strong>Label:</strong> {{ $status->label }}</p>
    <p><strong>Demande Validée:</strong> {{ $status->demance_Valider ? 'Yes' : 'No' }}</p>
    <p><strong>Demande En Cours:</strong> {{ $status->demand_en_cours ? 'Yes' : 'No' }}</p>
    <p><strong>Demande Terminée:</strong> {{ $status->demande_Terminer ? 'Yes' : 'No' }}</p>
    <a href="{{ route('statuses.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
