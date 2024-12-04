@extends('layouts.default')

@section('title', 'À propos')

@section('header')
    À propos
@endsection

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold">À propos de ElleConnect</h2>
        <p class="mt-4">
            L'application ElleConnect a été développée pour offrir un accès Internet équitable et centralisé à tous les étudiants
            résidant au Campus la Futaie. Notre mission est de garantir une connexion stable à un prix abordable, tout en simplifiant
            la gestion pour les résidents et l'administration.
        </p>
        <ul class="mt-4 list-disc pl-6">
            <li>Tarif annuel : 35€ (ou 30€ après Pâques).</li>
            <li>Choix de câbles réseau adaptés.</li>
            <li>Système de paiement simple et sécurisé.</li>
            <li>Gestion technique optimisée pour une expérience fluide.</li>
        </ul>
    </div>
@endsection
