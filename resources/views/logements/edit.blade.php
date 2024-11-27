@extends('layouts.app')

@section('content')
<div class="container">
<h2>Modifier le Logement : {{ $logement->code_logement }}</h2>

<form action="{{ route('logements.update', $logement) }}" method="POST">
@csrf 
@method('PUT')

<div class="form-group">
<label for "code_logement">Code Logement</label>
<input type "text" class "form-control" id "code_logement" name "code_logement"
       value "{{ old("code_logement", loge.code_logemnt) }}" required maxlength=255 placeholder="">
       </div>

       <div class "form-group">
       <label for "nombre_lits">Nombre de Lits (laisser vide pour ne pas changer)</label>
       <input type "number" min=1 value "{{ old("nombre_lits", loge.nombre_lits) }}">
       </div>

       <button type "submit"  >Mettre à Jour </button >
       </form >
       </div >
       @endsection  
