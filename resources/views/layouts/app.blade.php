<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <!-- Définition de la charset et de la langue de la page -->
        <meta charset="utf-8">
        <!-- Définition de la vue portable pour les appareils mobiles -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Token CSRF pour la sécurité des requêtes -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Titre de la page -->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Polices (commentées pour l'exemple) 
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->

        <!-- Inclusion des fichiers CSS et JS compilés par Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased h-full">
        <!-- Conteneur principal pour la hauteur minimale de la page -->
        <div class="min-h-full">
            <!-- Section de header avec un fond indigo et un padding inférieur -->
            <div class="bg-indigo-600 pb-32">
                <!-- Inclusion du menu de navigation -->
                @include('layouts.navigation')

                <!-- Header de la page avec un padding vertical -->
                <header class="py-10">
                    <!-- Conteneur pour le contenu du header avec une largeur maximale et des marges -->
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <!-- Section pour le contenu du header, à définir dans les vues enfants -->
                        @yield('header')
                    </div>
                </header>
            </div>

            <!-- Section principale du contenu avec un décalage négatif pour compenser le padding du header -->
            <main class="-mt-32">
                <!-- Conteneur pour le contenu principal avec une largeur maximale et des marges -->
                <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
                    <!-- Conteneur pour le contenu avec un fond blanc, des bordures arrondies et une ombre -->
                    <div class="bg-white rounded-lg shadow">
                        <!-- Flexbox pour organiser le menu et le contenu -->
                        <div class="flex">
                            <!-- Inclusion du menu latéral -->
                            @include('includes.menu')
                            <!-- Section pour le contenu principal, à définir dans les vues enfants -->
                            <div class="flex-1 p-6">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
