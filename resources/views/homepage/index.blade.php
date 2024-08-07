<!-- resources/views/homepage/index.blade.php -->

<x-guest-layout>
    <div class="container mx-auto p-6">
        <h1 class="font-bold text-4xl mb-6 text-center text-red-600">POKEDEX</h1>


        <!-- Affichage des Pokémon -->
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($pokemons as $pokemon)
                <li class="bg-gradient-to-r from-yellow-400 via-red-500 to-red-600 border border-gray-200 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                    <a href="{{ route('homepage.pokemons.show', $pokemon->id) }}" class="block">
                        <img src="{{ Storage::url($pokemon->img_path) }}"
                             alt="image du pokemon"
                             class="w-full h-48 object-cover object-center transform hover:scale-105 transition duration-500"
                        />
                    </a>

                    <div class="p-4 bg-white">
                        <h2 class="font-bold text-xl mb-2 text-red-700">#{{ $pokemon->id  }}</h2>
                        <h2 class="font-bold text-xl mb-2 text-red-700">{{ $pokemon->nom }}</h2>
                        <div class="flex justify-between items-center text-gray-800">
                            <p class="font-semibold">PV: {{ $pokemon->pv }}</p>
                            <p class="font-semibold">Poids: {{ $pokemon->poids }} kg</p>
                        </div>
                        <p class="text-gray-700 mt-2">Taille: {{ $pokemon->taille }} m</p>



                    </div>


                </li>
            @endforeach
        </ul>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $pokemons->links() }}
        </div>
    </div>
</x-guest-layout>
