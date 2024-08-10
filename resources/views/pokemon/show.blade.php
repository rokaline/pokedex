<!-- resources/views/pokemon/show.blade.php -->
<!-- tableau liste des Pokemon (dans admin)  -->
<x-guest-layout>
    <!-- Informations du Pokémon -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-start bg-gray-100 p-6 rounded-lg shadow-lg">

        <!-- Nom du Pokémon -->
        <div class="mb-6 text-center">
            <h1 class="font-bold text-4xl mb-4 text-red-600 capitalize bg-gradient-to-r from-red-500 to-yellow-500 bg-clip-text text-transparent">
                #{{ $pokemon->id }}: {{ $pokemon->nom }}
            </h1>
        </div>


        {{-- Bloc pour affichage du type et des attaques --}}
        <div class="md:w-3/4">

            {{-- Image et informations du Pokémon --}}
            <div class="mt-4 text-center">
                <img src="{{ Storage::url($pokemon->img_path) }}"
                    alt="image du pokemon"
                    class="rounded-lg shadow-lg aspect-auto object-cover object-center mx-auto w-1/6 border-4 border-red-500">

                    <div class="text-lg text-gray-800 mb-4">
                        <p><strong class="font-semibold">PV:</strong> {{ $pokemon->pv }}</p>
                        <p><strong class="font-semibold">Poids:</strong> {{ $pokemon->poids }} kg</p>
                        <p><strong class="font-semibold">Taille:</strong> {{ $pokemon->taille }} m</p>
                    </div>
            </div>



            {{-- Attaques --}}
            <div class="mb-6">

                @if($pokemon->attaques)
                    @foreach($pokemon->attaques as $attaque)

                    {{-- NOM --}}
                    <h2 class="font-bold text-xl text-gray-800 mb-2">

                                Attaque #{{ $attaque->id  }}: {{ $attaque->nom }}</h2>



                            {{-- PHOTO --}}
                            <img src="{{ Storage::url($attaque->img_path) }}"
                                alt="image de l'attaque"
                                class="rounded-lg shadow-md aspect-auto object-cover object-center mx-auto w-1/6 border-4 border-gray-300 mb-4">

                            {{-- DEGATS --}}
                            <div class="text-lg text-gray-700">
                                <p><strong>Dégâts:</strong> {{ $attaque->dégâts }}</p>

                            {{-- DESCRIPTION --}}
                                <p><strong>Description:</strong> <p class="mt-2">{{ $attaque->description }}</p>

                            {{-- TYPE --}}
                                <p><strong>Type</strong> {{ $attaque->type->nom }}</p>
                                <img src="{{ Storage::url($attaque->type->img_path) }}"
                                    alt="{{ $attaque->type->nom }}"
                                    class="rounded-full shadow-md aspect-auto object-cover object-center w-8 h-8 border-2 border-gray-300 mt-2">
                                <p><strong>Couleur:</strong> <span style="color: {{ $attaque->type->couleur }}">{{ $attaque->type->couleur }}</span></p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-gray-600">Aucune attaque disponible pour ce Pokémon.</p>
                @endif
            </div>
        </div>

        {{-- Bouton de retour --}}
        <div class="mt-8 flex items-center justify-center">
            <a href="{{ route('homepage.index') }}" class="font-bold bg-red-500 text-white px-4 py-2 rounded shadow-lg hover:bg-red-600 transition">
                Retour à la liste des Pokémon
            </a>
        </div>
    </div>
</x-guest-layout>
