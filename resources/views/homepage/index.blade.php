<!-- resources/views/homepage/index.blade.php -->

<x-guest-layout>
    <div class="container mx-auto p-6">
        <h1 class="font-bold text-8xl mb-8 text-center text-red-800 bg-clip-text text-transparent bg-gradient-to-r from-red-800 to-red-800">POKEDEX</h1>

        <!-- Affichage des Pokémon -->
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($pokemons as $pokemon)
                <li class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-transform duration-300 transform hover:scale-105">
                    <a href="{{ route('homepage.pokemons.show', $pokemon->id) }}" class="block">
                        <img src="{{ Storage::url($pokemon->img_path) }}"
                             alt="Image du Pokémon"
                             class="w-full h-48 object-cover object-center"
                        />
                    </a>

                    <div class="p-6 bg-gradient-to-br from-yellow-100 via-red-50 to-red-100">
                        <h2 class="font-bold text-2xl mb-2 text-red-600">#{{ $pokemon->id }}</h2>
                        <h3 class="font-bold text-xl mb-4 text-red-500">{{ $pokemon->nom }}</h3>
                        <div class="flex flex-col gap-2 text-gray-800">
                            <div class="flex justify-between">
                                <p class="font-semibold">PV: {{ $pokemon->pv }}</p>
                                <p class="font-semibold">Poids: {{ $pokemon->poids }} kg</p>
                            </div>
                            <p class="text-gray-700">Taille: {{ $pokemon->taille }} m</p>
                        </div>

                        <!-- Affichage des types -->
                        <div class="mt-6 flex flex-col gap-2">
                            @if($pokemon->types->count() > 0)
                                @foreach($pokemon->types as $type)
                                    <div class="flex items-center gap-2 text-gray-800">
                                        <img src="{{ Storage::url($type->img_path) }}"
                                             alt="{{ $type->nom }}"
                                             class="w-8 h-8 rounded-full border-2 border-gray-300 shadow-sm"
                                        />
                                        <span class="font-semibold" style="color: {{ $type->couleur }}">{{ $type->nom }}</span>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center text-gray-600">Aucun type disponible pour ce Pokémon.</p>
                            @endif
                        </div>
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
