<!-- Section de navigation avec un fond gris clair et une ombre -->
<aside class="bg-gray-100 w-64 min-h-screen py-4 px-6 shadow-lg">
    <!-- Titre du menu de navigation -->
    <h2 class="text-lg font-bold mb-4">Menu de Navigation</h2>
    
    <!-- Liste des liens de navigation -->
    <ul class="space-y-3">
        <!-- Lien vers la page d'accueil -->
        <li><a href="{{ route('home') }}" class="text-blue-600 hover:underline">Accueil</a></li>
        
        <!-- Lien vers la page à propos -->
        <li><a href="{{ route('about') }}" class="text-blue-600 hover:underline">À propos</a></li>

        <!-- Vérification si l'utilisateur est connecté -->
        @auth
            <!-- Vérification des rôles de l'utilisateur connecté -->
            @if(Auth::user()->isAdmin())
                <!-- Liens disponibles pour les administrateurs -->
                <li><a href="{{ route('roles.index') }}" class="text-blue-600 hover:underline">Rôles</a></li>
                <li><a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Utilisateurs</a></li>
                <li><a href="{{ route('logements.index') }}" class="text-blue-600 hover:underline">Logements</a></li>
                <li><a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">Produits</a></li>
                <li><a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">Commandes</a></li> 
            
            @elseif(Auth::user()->isEtudiant())
                <!-- Liens disponibles uniquement pour les étudiants -->
                <li><a href="{{ route('roles.index') }}" class="text-blue-600 hover:underline">Rôles</a></li>
                <li><a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">Mes Commandes</a></li>
                <li><a href="{{ route('profile.edit') }}" class="text-blue-600 hover:underline">Mon Profil</a></li>
            
            @elseif(Auth::user()->isTechnicien())
                <!-- Liens disponibles pour les techniciens -->
                <li><a href="/technicien/support" class="text-blue-600 hover:underline">Support Technique</a></li>

            @elseif(Auth::user()->isComptable())
                <!-- Liens disponibles pour les comptables -->
                <li><a href="/comptable/paiements" class="text-blue-600 hover:underline">Gestion des Paiements</a></li>

            @elseif(Auth::user()->isResponsable())
               <!-- Liens disponibles pour les responsables -->
               <!-- Ajoutez ici des liens spécifiques aux responsables si nécessaire -->

            @endif
        @endauth
    </ul>
</aside>
