<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ElleConnect</title>
  <link rel="stylesheet" href="css/styles.css" media="all">
</head>

<body>
<div class="website">
  <header class="header" role="banner">
    <!-- Lorem Elsass ipsum lacus leverwurscht Wurschtsalad mamsell Gal. gewurztraminer turpis, suspendisse commodo Oberschaeffolsheim ornare aliquam semper Miss Dahlias Mauris turpis sagittis kuglopf eleifend dignissim baeckeoffe geht's Richard Schirmeck mollis
    habitant schnaps ante et sit leo schpeck sit Salu bissame Salut bisamme varius quam. -->
  </header>
  <aside class="bg-gray-100 w-64 min-h-screen py-4 px-6 shadow-lg">
    <h2 class="text-lg font-bold mb-4">Menu de Navigation</h2>
    <ul class="space-y-3">
        <!-- Lien vers les pages -->
        <li><a href="/home" class="text-blue-600 hover:underline">Accueil</a></li>
        <li><a href="/about" class="text-blue-600 hover:underline">À propos</a></li>

        <!-- Ressources CRUD -->
        <li><a href="{{ route('roles.index') }}" class="text-blue-600 hover:underline">Rôles</a></li>
        <li><a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Utilisateurs</a></li>
        <li><a href="{{ route('logements.index') }}" class="text-blue-600 hover:underline">Logements</a></li>
        <li><a href="{{ route('payment_methods.index') }}" class="text-blue-600 hover:underline">Méthodes de Paiement</a></li>
        <li><a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">Produits</a></li>
        <li><a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">Commandes</a></li>
        <li><a href="{{ route('statuses.index') }}" class="text-blue-600 hover:underline">Statuts</a></li>

        <!-- Sections administratives -->
        @auth
            @if(Auth::user()->hasRole('admin'))
                <li><a href="/admin/stats" class="text-blue-600 hover:underline">Statistiques</a></li>
                <li><a href="/admin/users" class="text-blue-600 hover:underline">Gestion des Utilisateurs</a></li>
            @endif
        @endauth
    </ul>
</aside>

  
  <main id="main" role="main" class="main">
    <!-- <p>Yoo ch'ai lu dans les DNA que le Racing a encore perdu contre Oberschaeffolsheim. Verdammi et moi ch'avais donc parié deux knacks et une flammekueche. Ah so ? T'inquiète, ch'ai ramené du schpeck, du chambon, un kuglopf et du schnaps dans mon rucksack. Allez, s'guelt ! Wotch a kofee avec ton bibalaekaess et ta wurscht ? Yeuh non che suis au réchime, je ne mange plus que des Grumbeere light et che fais de la chym avec Chulien. Tiens, un rottznoz sur le comptoir.</p>
    <p>Tu restes pour le lotto-owe ce soir, y'a baeckeoffe ? Yeuh non, merci vielmols mais che dois partir à la Coopé de Truchtersheim acheter des mänele et des rossbolla pour les gamins. Hopla tchao bissame ! Consectetur adipiscing elit amet elementum nullam bissame bredele Heineken picon bière gal sed risus, condimentum Verdammi ch'ai ac réchime météor barapli s'guelt quam, non Christkindelsmärik blottkopf, Carola tellus rucksack vielmols, Gal !</p> -->
  </main>
</div>
</body>

</html>

