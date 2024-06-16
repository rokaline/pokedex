<!-- resources/views/pokemon/show.blade.php -->

<x-guest-layout>
    <div class="container mx-auto p-6">



        <h1> ADMIN/Pokemon/index </h1>

        <h1 class="font-bold text-3xl mb-4 capitalize text-center text-red-500">{{ $pokemon->nom }}</h1>

        {{-- Image et informations du Pokémon --}}
        <div class="mt-4 text-center">
            <img src="{{ Storage::url($pokemon->img_path) }}"
                alt="image du pokemon"
                class="rounded-lg shadow-lg aspect-auto object-cover object-center mx-auto w-1/6 border-4 border-red-500">

            <div class="mt-4 text-lg text-gray-700">
                <p><strong>PV:</strong> {{ $pokemon->pv }}</p>
                <p><strong>Poids:</strong> {{ $pokemon->poids }} kg</p>
                <p><strong>Taille:</strong> {{ $pokemon->taille }} m</p>
            </div>
        </div>

        {{-- Bloc pour affichage du type et des attaques --}}
        <div class="mt-8">
            {{-- Types --}}
            <div class="mb-6">
                <h2 class="font-semibold text-2xl text-gray-800 text-center mb-4">Types</h2>
                @if($pokemon->types)
                    @foreach($pokemon->types as $type)
                        <div class="flex items-center justify-center mb-2">
                            <img src="{{ Storage::url($type->img_path) }}"
                                alt="{{ $type->nom }}"
                                class="rounded-full shadow-md aspect-auto object-cover object-center w-12 h-12 border-2 border-gray-300">
                            <span class="ml-2 font-semibold text-lg" style="color: {{ $type->couleur }}">{{ $type->nom }}</span>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-gray-600">Aucun type disponible pour ce Pokémon.</p>
                @endif
            </div>

            {{-- Attaques --}}
            <div class="mb-6">
                <h2 class="font-semibold text-2xl text-gray-800 text-center mb-4">Attaques</h2>
                @if($pokemon->attaques)
                    @foreach($pokemon->attaques as $attaque)
                        <div class="mb-4 border border-gray-300 p-4 rounded-md shadow-lg bg-gray-100">
                            <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $attaque->nom }}</h3>

                            <img src="{{ Storage::url($attaque->img_path) }}"
                                alt="image de l'attaque"
                                class="rounded-lg shadow-md aspect-auto object-cover object-center mx-auto w-1/6 border-4 border-gray-300 mb-4">

                            <div class="text-lg text-gray-700">
                                <p><strong>Dégâts:</strong> {{ $attaque->dégâts }}</p>
                                <p><strong>Description:</strong> <p class="mt-2">{{ $attaque->description }}</p>
                                <p><strong>Type:</strong> {{ $attaque->type->nom }}</p>
                                <img src="{{ Storage::url($attaque->type->img_path) }}"
                                    alt="{{ $attaque->type->nom }}"
                                    class="rounded-full shadow-md aspect-auto object-cover object-center w-36 h-36 border-2 border-gray-300 mt-2">
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
