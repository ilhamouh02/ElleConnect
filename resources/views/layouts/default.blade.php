<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <!-- Définition de la charset et de la langue de la page -->
    <meta charset="UTF-8">
    <!-- Définition de la vue portable pour les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Token CSRF pour la sécurité des requêtes -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Feuilles de style -->
    <link rel="stylesheet" href="{{ asset('styles/Elle.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}">

    <!-- Titre de la page, utilisant @yield pour permettre la personnalisation -->
    <title>@yield('title', 'ElleConnect')</title>
</head>

<body class="h-full font-sans antialiased">
    <!-- Conteneur principal avec un flexbox pour organiser le sidebar et le contenu principal -->
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="bg-indigo-700 text-white w-64 p-6 shadow-lg">
            <!-- Titre du sidebar -->
            <h1 class="text-2xl font-bold mb-6 text-center">ElleConnect</h1>

            <!-- Menu dynamique basé sur le rôle de l'utilisateur -->
            <ul class="space-y-4">
                @auth
                    @php
                        // Récupération du label du rôle de l'utilisateur
                        $role = Auth::user()->role->label;
                    @endphp

                    <!-- Menu commun à tous les utilisateurs authentifiés -->
                    <li><a href="{{ route('home') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Accueil</a></li>
                    <li><a href="{{ route('about') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">À propos</a></li>

                    <!-- Menu spécifique selon le rôle de l'utilisateur -->
                    @if ($role === 'admin')
                        <!-- Liens pour les administrateurs -->
                        <li><a href="{{ route('roles.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Rôles</a></li>
                        <li><a href="{{ route('users.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Utilisateurs</a></li>
                        <li><a href="{{ route('logements.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Logements</a></li>
                        <li><a href="{{ route('payment_methods.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Méthodes de Paiement</a></li>
                        <li><a href="{{ route('products.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Produits</a></li>
                        <li><a href="{{ route('orders.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Commandes</a></li>
                        <li><a href="{{ route('statuses.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Statuts</a></li>
                        <li><a href="{{ route('admin.stats') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Statistiques</a></li>
                    @elseif ($role === 'etudiant')
                        <!-- Liens pour les étudiants -->
                        <li><a href="{{ route('orders.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Mes Commandes</a></li>
                        <li><a href="{{ route('profile.edit') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Mon Profil</a></li>
                    @elseif ($role === 'comptable')
                        <!-- Liens pour les comptables -->
                        <li><a href="{{ route('payment_methods.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Suivi des Paiements</a></li>
                        <li><a href="{{ route('invoices.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Factures</a></li>
                    @elseif ($role === 'responsable_reseau')
                        <!-- Liens pour les responsables de réseau -->
                        <li><a href="{{ route('network.status') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">État du Réseau</a></li>
                        <li><a href="{{ route('incidents.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Gestion des Incidents</a></li>
                    @elseif ($role === 'responsable_residence')
                        <!-- Liens pour les responsables de résidence -->
                        <li><a href="{{ route('logements.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Gestion des Logements</a></li>
                        <li><a href="{{ route('support.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Support Technique</a></li>
                    @endif
                @else
                    <!-- Menu pour les visiteurs non authentifiés -->
                    <li><a href="{{ route('login') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Connexion</a></li>
                    <li><a href="{{ route('register') }}" class="block py-2 px-4 rounded hover:bg-indigo-600">Inscription</a></li>
                @endauth
            </ul>
        </aside>

        <!-- Contenu principal -->
        <div class="flex flex-col flex-grow p-6 bg-white shadow-md">
            <!-- Section pour le contenu principal, à définir dans les vues enfants -->
            @yield('content')
        </div>
    </div>
</body>
</html>
