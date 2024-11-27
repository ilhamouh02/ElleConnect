@extends('layouts.app')

@section('content')
<div class="container">
<h2>Modifier le Rôle : {{ $role->name }}</h2>

<form action="{{ route('roles.update', $role) }}" method="POST">
@csrf 
@method('PUT')

<div class="form-group">
<label for="name">Nom du Rôle</label>
<input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}" required maxlength="255">
</div>

<button type="submit" class="btn btn-primary mt-3">Mettre à Jour</button>

</form>

</div> 
@endsection 
