@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Status</h1>
    <a href="{{ route('statuses.create') }}" class="btn btn-primary mb-3">Create New Status</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Label</th>
                <th>Demande Validée</th>
                <th>Demande En Cours</th>
                <th>Demande Terminée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statuses as $status)
            <tr>
                <td>{{ $status->id_Status }}</td>
                <td>{{ $status->label }}</td>
                <td>{{ $status->demance_Valider ? 'Yes' : 'No' }}</td>
                <td>{{ $status->demand_en_cours ? 'Yes' : 'No' }}</td>
                <td>{{ $status->demande_Terminer ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('statuses.show', $status->id_Status) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('statuses.edit', $status->id_Status) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('statuses.destroy', $status->id_Status) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
