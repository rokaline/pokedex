<!-- vue de la page du pokemon sélectionné -->


<!-- resources/views/pokemon/show.blade.php -->

<x-guest-layout>
    <h1 class="font-bold text-xl mb-4 capitalize">{{ $pokemon->nom }}</h1>

    <div class="flex items-center justify-center">
        <img
            src="{{ asset('images/' . $pokemon->image) }}"
            alt="{{ $pokemon->nom }}"
            class="rounded shadow aspect-auto object-cover object-center"
        />
    </div>

    <div class="mt-4"> <!-- Nom POkemon -->
        <p><strong>PV:</strong> {{ $pokemon->pv }}</p>
        <p><strong>Poids:</strong> {{ $pokemon->poids }} kg</p>
        <p><strong>Taille:</strong> {{ $pokemon->taille }} m</p>
    </div>

    <div class="mt-4"> <!-- type -->
        <h2 class="font-bold text-lg">Types</h2>
        @foreach($pokemon->types as $type)
            <div class="flex items-center">
                <img src="{{ asset('images/' . $type->image) }}" alt="{{ $type->nom }}" class="w-6 h-6">
                <span class="ml-2">{{ $type->nom }}</span>
            </div>
        @endforeach
    </div>

    <div class="mt-4"><!-- attaques-->
        <h2 class="font-bold text-lg">Attaques</h2>
        @foreach($pokemon->attaques as $attaque)
            <div class="mb-4">
                <h3 class="font-bold">{{ $attaque->nom }}</h3>
                <img src="{{ asset('images/' . $attaque->image) }}" alt="{{ $attaque->nom }}" class="w-12 h-12">
                <p><strong>Dégâts:</strong> {{ $attaque->degats }}</p>
                <p>{{ $attaque->description }}</p>
                <p><strong>Type:</strong> {{ $attaque->type->nom }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-8 flex items-center justify-center">
        <a
            href="{{ route('pokemons.index') }}"
            class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
            Retour à la liste des Pokémon
        </a>
    </div>
</x-guest-layout>


