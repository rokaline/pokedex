<!-- resources/views/pokemon/show.blade.php -->
{{--
 <x-guest-layout>


    <h1 class="font-bold text-xl mb-4 capitalize">{{ $pokemon->nom }}</h1>

    <div class="mt-4">

        <img src="{{ Storage::url($pokemon->img_path)}}"
            alt="image du pokemon"
            class="rounded shadow aspect-auto object-cover object-center">{{ $pokemon->img_path }}</span>
                </div>

            <p><strong>PV:</strong> {{ $pokemon->pv }}</p>
            <p><strong>Poids:</strong> {{ $pokemon->poids }} kg</p>
            <p><strong>Taille:</strong> {{ $pokemon->taille }} m</p>

            </div>


{{-- bloc pour affichage du type et des attaques --}}

    {{-- <div class="mt-4">

        @if($pokemon->attaques)
            @foreach($pokemon->attaques as $attaque)
                <div class="mb-4 border border-gray-300 p-4 rounded-md">
                    <h3 class="font-bold">Nom de l'attaque: {{ $attaque->nom }}</h3>

                    <img src="{{ Storage::url($attaque->img_path)}}"
                    alt="image du pokemon"
                    class="rounded shadow aspect-auto object-cover object-center">{{ $attaque->img_path }}</span>
                        </div>

                    <p><strong>Dégâts:</strong> {{ $attaque->dégâts }}</p>
                    <p>{{ $attaque->description }}</p>

                    <p><strong>Type:</strong> {{ $attaque->type->nom }}</p>
                    <img src="{{ Storage::url($attaque->type->img_path)}}"
                    alt="image du pokemon"
                    class="rounded shadow aspect-auto object-cover object-center">{{ $pokemon->img_path }}</span>
                        </div>
                    <p><strong>Couleur:</strong> {{ $attaque->type->couleur }}</p>
                </div>
            @endforeach
        @else
            <p>Aucune attaque disponible pour ce Pokémon.</p>
        @endif
    </div>

    <div class="mt-8 flex items-center justify-center">
        <a href="{{ route('homepage.index') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
            Retour à la liste des Pokémon (sur la homepage)
        </a>
    </div>
</x-guest-layout>  --}}

{{-- attaque : ex: nom :Flammes Éternelles, image:atFlamme.jpg	, degats:90, description:	Un torrent de feu brûlant l'ennemi avec une intensité inégalée. Peut parfois brûler la cible., type:	Feu
--}}


















<!-- resources/views/pokemon/show.blade.php -->

<x-guest-layout>

    {{-- Nom du Pokémon --}}
    <h1 class="font-bold text-xl mb-4 capitalize text-center">{{ $pokemon->nom }}</h1>

    {{-- Image et informations du Pokémon --}}
    <div class="mt-4 text-center">
        <img src="{{ Storage::url($pokemon->img_path) }}"
            alt="image du pokemon"
            class="rounded shadow aspect-auto object-cover object-center mx-auto w-1/3">

        <p class="mt-4"><strong>PV:</strong> {{ $pokemon->pv }}</p>
        <p><strong>Poids:</strong> {{ $pokemon->poids }} kg</p>
        <p><strong>Taille:</strong> {{ $pokemon->taille }} m</p>
    </div>

    {{-- Bloc pour affichage du type et des attaques --}}
    <div class="mt-8">

        {{-- Types --}}

        @if($pokemon->types)
            @foreach($pokemon->types as $type)
                <div class="flex items-center justify-center mb-2">
                    <img src="{{ Storage::url($type->img_path) }}"
                        alt="{{ $type->nom }}"
                        class="rounded shadow aspect-auto object-cover object-center mx-auto w-1/4">
                    <span class="ml-2" style="color: {{ $type->couleur }}">{{ $type->nom }}</span>
                </div>
            @endforeach
        @else
            <p>Aucun type disponible pour ce Pokémon.</p>
        @endif

        {{-- Attaques --}}
        @if($pokemon->attaques)
            @foreach($pokemon->attaques as $attaque)
                <div class="mb-4 border border-gray-300 p-4 rounded-md">
                    <h3 class="font-bold">Nom de l'attaque: {{ $attaque->nom }}</h3>

                    <img src="{{ Storage::url($attaque->img_path) }}"
                        alt="image de l'attaque"
                        class="rounded shadow aspect-auto object-cover object-center mx-auto w-1/3">

                    <p class="mt-4"><strong>Dégâts:</strong> {{ $attaque->dégâts }}</p>
                    <p>{{ $attaque->description }}</p>

                    <p><strong>Type:</strong> {{ $attaque->type->nom }}</p>
                    <img src="{{ Storage::url($attaque->type->img_path) }}"
                        alt="{{ $attaque->type->nom }}"
                        class="rounded shadow aspect-auto object-cover object-center mx-auto w-1/4">
                    <p><strong>Couleur:</strong> <span style="color: {{ $attaque->type->couleur }}">{{ $attaque->type->couleur }}</span></p>
                </div>
            @endforeach
        @else
            <p>Aucune attaque disponible pour ce Pokémon.</p>
        @endif
    </div>

    {{-- Bouton de retour --}}
    <div class="mt-8 flex items-center justify-center">
        <a href="{{ route('homepage.index') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
            Retour à la liste des Pokémon (sur la homepage)
        </a>
    </div>
</x-guest-layout>









