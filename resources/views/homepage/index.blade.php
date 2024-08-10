<x-guest-layout>
    <div class="container mx-auto p-6">
        <!-- Mot POKEDEX avec design amélioré -->
        <h1 class="font-bold text-8xl mb-8 text-center text-white bg-red-600 p-4 rounded-lg shadow-lg border-4 border-yellow-300 bg-gradient-to-r from-red-700 via-red-500 to-red-700">
            POKEDEX
        </h1>

        <!-- Formulaire de filtre affichage du pokemon recherché dans pokemon.show-->
        <div class="container mx-auto p-6 bg-white rounded-lg shadow-xl">
            <h1 class="font-bold text-4xl mb-6 text-center text-red-600">Recherche Pokemon et caractéristiques</h1>

            <form action="{{ route('homepage.index') }}" method="GET" class="mb-8 space-y-4">
                <div class="flex justify-center space-x-4">

                    <!-- recherche Pokémon -->
                    <input
                        type="text"
                        name="search"
                        id="search"
                        placeholder="Rechercher un Pokemon"
                        class="border border-red-500 rounded shadow px-4 py-2 w-1/4 focus:outline-none focus:ring-2 focus:ring-red-500"
                        value="{{ request()->search }}"
                        autofocus
                    />

                    <button
                        type="submit"
                        class="bg-red-500 text-white rounded shadow px-4 py-2 hover:bg-red-700 transition"
                    >
                        Rechercher
                    </button>
                </div>

                <div class="flex justify-center space-x-4">
                     <!-- recherche Type -->
                    <select
                        name="type"
                        id="type"
                        class="border border-red-500 rounded shadow px-4 py-2 w-1/4 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                        <option value="">Types</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ request()->type == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>

                    <button
                        type="submit"
                        class="bg-red-500 text-white rounded shadow px-4 py-2 hover:bg-red-700 transition"
                    >
                        Rechercher par Type
                    </button>
                </div>

                <div class="flex justify-center space-x-4">
                   <!-- recherche Attaque -->
                   <select
                       name="attaque"
                       id="attaque"
                       class="border border-red-500 rounded shadow px-4 py-2 w-1/4 focus:outline-none focus:ring-2 focus:ring-red-500"
                   >
                       <option value="">Attaques</option>
                       @foreach($attaques as $attaque)
                           <option value="{{ $attaque->id }}" {{ request()->attaque == $attaque->id ? 'selected' : '' }}>
                               {{ $attaque->nom }}
                           </option>
                       @endforeach
                   </select>

                   <button
                       type="submit"
                       class="bg-red-500 text-white rounded shadow px-4 py-2 hover:bg-red-700 transition"
                   >
                       Rechercher par Attaque
                   </button>
               </div>
            </form>
        </div>

        <!-- Affichage des Pokémon -->
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-8">
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
                            <p class="font-semibold">Taille: {{ $pokemon->taille }} m</p>
                        </div>

                        <!-- Affichage des types -->
                        <div class="mt-6 flex flex-col gap-2 font-semibold">Type
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
