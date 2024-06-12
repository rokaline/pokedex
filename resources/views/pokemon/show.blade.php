<!-- vue de la page du pokemon sélectionné -->


<!-- resources/views/pokemon/show.blade.php -->

<x-guest-layout>


  Dans pokomeon/show
    <h1 class="font-bold text-xl mb-4 capitalize">{{ $pokemon->nom }}</h1> <!-- Nom POkemon -->

    {{-- <div class="flex items-center justify-center"> ancien chemin pour image
        <img
            src="{{ asset('images/' . $pokemon->image) }}"
            alt="{{ $pokemon->nom }}"
            class="rounded shadow aspect-auto object-cover object-center"
        />
    </div> --}}

    <div class="mt-4">
        <!-- Conteneur pour l'image du pokemon -->

        <div class="flex items-center justify-center border border-red-500">
            <img
            src="{{ Storage::url($pokemon->img_path)}}"
            alt="image du pokemon"
            class="rounded shadow aspect-auto object-cover object-center"
            />
        </div>
        <p><strong>PV: </strong> {{ $pokemon->pv }}</p>
        <p><strong>Poids: </strong> {{ $pokemon->poids }} kg</p>
        <p><strong>Taille: </strong> {{ $pokemon->taille }} m</p>
    </div>

    <div class="mt-4"> <!-- type -->
        <h2 class="font-bold text-lg">Types</h2>
        @foreach($pokemon->types as $type)
            <div class="flex items-center">
                {{-- <img src="{{ asset('images/' . $type->image) }}" alt="{{ $type->nom }}" class="w-6 h-6"> --}}
                <p><strong>Nom: </strong> <span class="ml-2">{{ $type->nom }}</span>

                 <!-- Conteneur pour l'image de l'attaque -->
                 <div class="flex items-center justify-center">
                    <img
                    src="{{ Storage::url($type->img_path)}}"
                    alt="image dy type"
                    class="rounded shadow aspect-auto object-cover object-center"
                    />
                </div>
                <p><strong>Couleur: </strong> {{ $type->couleur }} m</p>
            </div>
        @endforeach
    </div>

    <div class="mt-4"><!-- attaques-->
        <h2 class="font-bold text-lg">Attaques</h2>
        @foreach($pokemon->attaques as $attaque)
            <div class="mb-4">
                <p><strong>Nom de l'attaque </strong> <span class="ml-2">{{ $attaque->nom }}</span>


                {{-- <img src="{{ asset('images/' . $attaque->image) }}" alt="{{ $attaque->nom }}" class="w-12 h-12"> --}}


                <!-- Conteneur pour l'image de l'attaque -->
                <div class="flex items-center justify-center">
                    <img
                    src="{{ Storage::url($attaque->img_path)}}"
                    alt="image de l'attaque"
                    class="rounded shadow aspect-auto object-cover object-center"
                    />
                </div>

                <p><strong>Dégâts:</strong> {{ $attaque->degats }}</p>
                <p><strong>Description de l'attaque </strong> {{ $attaque->description }}</p>
                <p><strong>Type:</strong> {{ $attaque->type->nom }}</p>
            </div>
        @endforeach
    </div>

    <!-- retour à la homepage-->
    <div class="mt-8 flex items-center justify-center">
        <a
            href="{{ route('homepage.index') }}"
            class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
            Retour à la liste des Pokémon (sur la homepage)
        </a>
    </div>
</x-guest-layout>


