@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Accueil') }}
    </h2>
@endsection

@section('content')
    <h2>Bienvenue sur la page d'accueil du site</h2>
    <p>Cette application gère l'accès Internet pour les étudiants de la résidence "Campus la Futaie".</p>
@endsection
