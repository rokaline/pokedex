<!-- resources/views/pokemon/show.blade.php -->

<x-guest-layout>

    {{-- pokkemon --}}
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


{{-- type; ex: photo: tyFeu,jpg	, Nom: Feu; couleurJaune
 --}}
    <div class="mt-4">
        <h2 class="font-bold text-lg">Type</h2>
        @if($pokemon->types)
            @foreach($pokemon->types as $type)
                <div class="mb-4 border border-gray-300 p-4 rounded-md">
                    <p><strong>Nom du type:</strong>{{ $type->nom }}</p>
                    <img src="{{ Storage::url($type->img_path)}}"
                    alt="image du type"
                    class="rounded shadow aspect-auto object-cover object-center">{{ $type->img_path }}</span>
                        </div>
                    <p><strong>couleur:</strong> {{ $type->couleur }}</p>
                </div>
            @endforeach
        @else
            <p>Aucune attaque disponible pour ce Pokémon.</p>
        @endif
    </div>




    <div class="mt-4">
        <h2 class="font-bold text-lg">Attaques</h2>
        @if($pokemon->attaques)
            @foreach($pokemon->attaques as $attaque)
                <div class="mb-4 border border-gray-300 p-4 rounded-md">
                    <h3 class="font-bold">{{ $attaque->nom }}</h3>
                    <img src="{{ asset('images/' . $attaque->image) }}" alt="{{ $attaque->nom }}" class="w-12 h-12 mb-2">
                    <p><strong>Dégâts:</strong> {{ $attaque->dégâts }}</p>
                    <p>{{ $attaque->description }}</p>
                    <p><strong>Type:</strong> {{ $attaque->type->nom }}</p>
                    <p><strong>Couleur:</strong> {{ $attaque->type->nom }}</p>
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
</x-guest-layout>

{{-- attaque : ex: nom :Flammes Éternelles, image:atFlamme.jpg	, degats:90, description:	Un torrent de feu brûlant l'ennemi avec une intensité inégalée. Peut parfois brûler la cible., type:	Feu
--}}



























