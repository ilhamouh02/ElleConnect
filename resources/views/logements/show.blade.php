@extends ('layouts.app')

@section ('content')
<div class ="container ">
<h2>Détails du Loge ment : {{ loge.code_logemnt }}</h2 >

<!-- Affichage des informations du logement -->
<div class ="card ">
<div  >{{ loge.code_logemnt }}</h5 >
<p ><strong >Nombre de Lits:</strong > {{ loge.nombre_lits }}</p >

<!-- Ajoutez d'autres informations si nécessaire -->
< / div >
< / div >

<!-- Boutons d'action -->
<a href ="{{ route (' loge.edit ', loge ) }}"  >Modifier </a >
<a href ="{{ route (' loge.index ') }} ">Retour à la Liste </a >

< / div >
< / section >
