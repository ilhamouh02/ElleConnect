
  
  <aside class="bg-gray-100 w-64 min-h-screen py-4 px-6 shadow-lg">
    <h2 class="text-lg font-bold mb-4">Menu de Navigation</h2>
    <ul class="space-y-3">
        <li><a href="{{ route('home') }}" class="text-blue-600 hover:underline">Accueil</a></li>
        <li><a href="{{ route('about') }}" class="text-blue-600 hover:underline">À propos</a></li>

        @auth
            @if(Auth::user()->isAdmin())
                <li><a href="{{ route('roles.index') }}" class="text-blue-600 hover:underline">Rôles</a></li>
                <li><a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Utilisateurs</a></li>
                <li><a href="{{ route('logements.index') }}" class="text-blue-600 hover:underline">Logements</a></li>
                <li><a href="{{ route('payment_methods.index') }}" class="text-blue-600 hover:underline">Méthodes de Paiement</a></li>
                <li><a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">Produits</a></li>
                <li><a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">Commandes</a></li>
                <li><a href="{{ route('statuses.index') }}" class="text-blue-600 hover:underline">Statuts</a></li>
                <li><a href="/admin/stats" class="text-blue-600 hover:underline">Statistiques</a></li>
            @elseif(Auth::user()->isEtudiant())
                <li><a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">Mes Commandes</a></li>
                <li><a href="{{ route('profile.edit') }}" class="text-blue-600 hover:underline">Mon Profil</a></li>
            @elseif(Auth::user()->isTechnicien())
                <li><a href="/technicien/support" class="text-blue-600 hover:underline">Support Technique</a></li>
            @elseif(Auth::user()->isComptable())
                <li><a href="/comptable/paiements" class="text-blue-600 hover:underline">Gestion des Paiements</a></li>
            @elseif(Auth::user()->isResponsable())
                <li><a href="/responsable/abonnements" class="text-blue-600 hover:underline">Gestion des Abonnements</a></li>
            @endif
        @endauth
    </ul>
</aside>

 