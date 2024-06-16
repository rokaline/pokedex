
<!-- resources/views/homepage/index.blade.php -->





<x-guest-layout>

    <h1 class="font-bold text-xl mb-4">POKEDEX</h1>
    <h1 class="font-bold text-xl mb-4">(homepage.index.blade)</h1>

    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        <!-- Boucle à travers chaque Pokémon pour les afficher -->
        @foreach ($pokemons as $pokemon)
            <li class="border border-black p-4 mb-4">
                <!-- Affiche le nom du Pokémon en gras -->
                Nom: <strong>{{ $pokemon->nom }}</strong><br>




                <a href="{{ route('homepage.pokemons.show', $pokemon->id) }}">
                    <img
                        src="{{ Storage::url($pokemon->img_path)}}"
                        alt="image du pokemon"
                        class="rounded shadow aspect-auto object-cover object-center"
                    />
                </a>


                <!-- Pagination pour naviguer entre les pages -->
                {{-- <div class="mt-8">
                    Pagination pour naviguer entre les pages
                {{ $pokemons->links() }} <!-- Affichage des liens de pagination -->
                </div>  --}}

            </li>
        @endforeach

    </ul>

</x-guest-layout>




