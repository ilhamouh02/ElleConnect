<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ElleConnect')</title>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-blue-900 text-white w-64 p-6">
            <h1 class="text-2xl font-bold mb-4">ElleConnect</h1>

            <!-- Menu dynamique basé sur le rôle -->
            <ul class="space-y-4">
                @auth
                    @php
                        $role = Auth::user()->role->label; // Récupération du label du rôle de l'utilisateur
                    @endphp

                    <!-- Menu commun à tous les utilisateurs -->
                    <li><a href="{{ route('home') }}" class="hover:underline">Accueil</a></li>
                    <li><a href="{{ route('about') }}" class="hover:underline">À propos</a></li>

                    <!-- Menu spécifique selon le rôle -->
                    @if ($role === 'admin')
                        <li><a href="{{ route('roles.index') }}" class="text-blue-600 hover:underline">Rôles</a></li>
                        <li><a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Utilisateurs</a></li>
                        <li><a href="{{ route('logements.index') }}" class="text-blue-600 hover:underline">Logements</a></li>
                        <li><a href="{{ route('payment_methods.index') }}" class="text-blue-600 hover:underline">Méthodes de Paiement</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">Produits</a></li>
                        <li><a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">Commandes</a></li>
                        <li><a href="{{ route('statuses.index') }}" class="text-blue-600 hover:underline">Statuts</a></li>
                        <li><a href="{{ route('admin.stats') }}" class="hover:underline">Statistiques</a></li>
                    @elseif ($role === 'etudiant')
                        <li><a href="{{ route('orders.index') }}" class="hover:underline">Mes Commandes</a></li>
                        <li><a href="{{ route('profile.edit') }}" class="hover:underline">Mon Profil</a></li>
                    @elseif ($role === 'comptable')
                        <li><a href="{{ route('payment_methods.index') }}" class="hover:underline">Suivi des Paiements</a></li>
                        <li><a href="{{ route('invoices.index') }}" class="hover:underline">Factures</a></li>
                    @elseif ($role === 'responsable_reseau')
                        <li><a href="{{ route('network.status') }}" class="hover:underline">État du Réseau</a></li>
                        <li><a href="{{ route('incidents.index') }}" class="hover:underline">Gestion des Incidents</a></li>
                    @elseif ($role === 'responsable_residence')
                        <li><a href="{{ route('logements.index') }}" class="hover:underline">Gestion des Logements</a></li>
                        <li><a href="{{ route('support.index') }}" class="hover:underline">Support Technique</a></li>
                    @endif
                @else
                    <!-- Menu pour visiteurs non authentifiés -->
                    <li><a href="{{ route('login') }}" class="hover:underline">Connexion</a></li>
                    <li><a href="{{ route('register') }}" class="hover:underline">Inscription</a></li>
                @endauth
            </ul>
        </aside>
        
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>
</body>
</html>
