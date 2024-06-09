
<!-- resources/views/homepage/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title> <!-- Titre de la page -->
</head>
<body>
    <h1>Homepage POKEDEX</h1> <!-- Titre principal de la page -->
    <h2>Pokémon</h2> <!-- Titre de la section des Pokémon -->
    <ul>
        <!-- Boucle à travers chaque Pokémon pour les afficher -->
        @foreach ($pokemons as $pokemon)
            <li>
                <!-- Affiche le nom du Pokémon en gras -->
                Nom: <strong>{{ $pokemon->nom }}</strong><br>

                <!-- Affiche les points de vie du Pokémon -->
                PV: {{ $pokemon->pv }}<br>

                <!-- Affiche le poids du Pokémon en kilogrammes -->
                Poids: {{ $pokemon->poids }} kg<br>

                <!-- Affiche la taille du Pokémon en mètres -->
                Taille: {{ $pokemon->taille }} m<br>

            </li>
        @endforeach
    </ul>
</body>
</html>
