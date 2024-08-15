<x-guest-layout>
    <!-- Conteneur principal -->
    <div class="container mx-auto p-6 bg-red-600 rounded-lg shadow-2xl border-4 border-red-500">

        <!-- Nom du Pokémon avec effet de texte -->
        <div class="mb-6 text-center">
            <h1 class="font-bold text-4xl mb-6 text-center text-blue">
                #{{ $pokemon->id }}: {{ $pokemon->nom }}
            </h1>
        </div>

        <!-- Image et informations du Pokémon -->
        <div class="flex flex-col md:flex-row md:justify-center md:items-start bg-white p-6 rounded-lg shadow-xl border-4 border-red-300">

            <div class="text-center">
                <img src="{{ Storage::url($pokemon->img_path) }}"
                    alt="image du pokemon"
                   class="rounded-lg shadow-2xl aspect-auto object-scale-down h-68 w-96 object-center mx-auto w-1/4 border-4 border-red-500 hover:scale-10 transition-transform duration-300">


                    <div class="text-lg text-gray-800 mb-4 mt-4 flex justify-center space-x-8">
                        <p><strong class="font-semibold">PV:</strong> {{ $pokemon->pv }}</p>
                        <p><strong class="font-semibold">Poids:</strong> {{ $pokemon->poids }} kg</p>
                        <p><strong class="font-semibold">Taille:</strong> {{ $pokemon->taille }} m</p>
                    </div>

                <!-- Affichage des types -->
                <div class="mt-6 flex flex-col gap-2 font-semibold">
                    @if($pokemon->types->count() > 0)
                    <div class="flex flex-col items-center text-gray-800 mb-4 mt-4">
                        <p class="font-semibold">Pokemon Type:</p>
                        <div class="flex items-center justify-center gap-4">
                            @foreach ($pokemon->types as $type)
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold" style="color: {{ $type->couleur }}">{{ $type->nom }}</span>
                                    <img src="{{ Storage::url($type->img_path) }}"
                                         alt="{{ $type->nom }}"
                                         class="w-12 h-12 rounded-full border-2 border-gray-300 shadow-sm"
                                    />

                                </div>
                            @endforeach
                    @else
                        <p class="text-center text-gray-600">Aucun type disponible pour ce Pokémon.</p>
                    @endif
                </div>
            </div>

            <!-- Bloc pour affichage du type et des attaques -->
            <div class="flex justify-center items-center mb-6">
                <div class="md:w-3/4 mt-6 md:mt-0">
                    <div class="bg-gradient-to-br from-yellow-100 via-red-50 to-red-100 p-6 rounded-lg shadow-inner mb-6">
                        <!-- Attaques -->
                        @if($pokemon->attaques)
                            @foreach($pokemon->attaques as $attaque)
                                <div class="mb-6">
                                    <!-- NOM -->
                                    <h2 class="font-bold text-2xl text-red-600 mb-2">
                                        Attaque #{{ $attaque->id }}: {{ $attaque->nom }}
                                    </h2>

                                    <!-- PHOTO -->
                                    <img src="{{ Storage::url($attaque->img_path) }}"
                                         alt="image de l'attaque"
                                         class="rounded-lg shadow-md aspect-auto object-cover object-center mx-auto w-1/6 border-4 border-gray-300 mb-4 hover:scale-105 transition-transform duration-300">
                                </div>

                                <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                                    <!-- DEGATS -->
                                    <p><strong>Dégâts:</strong> {{ $attaque->dégâts }}</p>

                                    <!-- DESCRIPTION -->
                                    <p><strong>Description de l'attaque:</strong>
                                        <span class="block mt-2">{{ $attaque->description }}</span>
                                    </p>
                                </div>
                                    <div class="flex items-center justify-center gap-4">
                                        <p><strong>Type:</strong> {{ $attaque->type->nom }}</p>
                                        <img src="{{ Storage::url($attaque->type->img_path) }}"
                                             alt="{{ $attaque->type->nom }}"
                                             class="rounded-full shadow-md object-cover object-center w-12 h-12 border-2 border-gray-300">
                                        <p><strong>Couleur:</strong>
                                            <span style="color: {{ $attaque->type->couleur }}">{{ $attaque->type->couleur }}</span>
                                        </p>
                                    </div>

                            @endforeach
                        @else
                            <p class="text-center text-gray-600">Aucune attaque disponible pour ce Pokémon.</p>
                        @endif
                    </div>
                </div>
            </div>







        <!-- Bouton de retour -->
        <div class="mt-8 flex items-center justify-center">
            <a href="{{ route('homepage.index') }}" class="font-bold bg-red-500 text-black px-6 py-3 rounded-full shadow-lg hover:bg-red-600 transition-transform transform hover:scale-105">
                Retour à la liste des Pokémon
            </a>
        </div>
    </div>
</x-guest-layout>
