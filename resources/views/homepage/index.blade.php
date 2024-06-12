
<!-- resources/views/homepage/index.blade.php -->

<x-guest-layout>

    <h1 class="font-bold text-xl mb-4">Liste des Pokemon</h1>
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        <!-- Boucle à travers chaque Pokémon pour les afficher -->
        @foreach ($pokemons as $pokemon)
            <li class="border border-black p-4 mb-4">
                <!-- Affiche le nom du Pokémon en gras -->
                Nom: <strong>{{ $pokemon->nom }}</strong><br>
{{--
                 <!-- Affiche les points de vie du Pokémon -->
                PV: {{ $pokemon->pv }}<br>

                <!-- Affiche le poids du Pokémon en kilogrammes -->
                Poids: {{ $pokemon->poids }} kg<br>

                <!-- Affiche la taille du Pokémon en mètres -->
                Taille: {{ $pokemon->taille }} m<br>

                <!-- Affiche l'image du Pokémon avec une bordure rouge -->
                {{-- <div class="border border-red-500">
                    Image du pokemon
                    <img src="{{ asset('images/'.$pokemon->image) }}" alt="{{ $pokemon->nom }} " class="w-full h-auto">
                </div> --}}



                <!-- Conteneur pour l'image du pokemon -->
                <div class="flex items-center justify-center border border-red-500">
                    <img
                    src="{{ Storage::url($pokemon->img_path)}}"
                    alt="image du pokemon"
                    class="rounded shadow aspect-auto object-cover object-center"
                    />
                </div>


                <!-- Liens de navigation pour chaque Pokémon -->
                <a class="flex bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
                href="{{ route('pokemons.show', $pokemon->id) }}">
                Informations à propos de :
                {{ $pokemon->nom }} <!-- Affichage du nom du Pokémon -->
                </a>


                <!-- Pagination pour naviguer entre les pages -->
                <div class="mt-8">
                    Pagination pour naviguer entre les pages
                {{ $pokemons->links() }} <!-- Affichage des liens de pagination -->
                </div>

            </li>
        @endforeach

    </ul>

</x-guest-layout>




