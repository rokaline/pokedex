<!-- resources/views/homepage/index.blade.php -->

<x-guest-layout>
    <div class="container mx-auto p-6">
        <h1 class="font-bold text-3xl mb-4 text-center text-red-500">POKEDEX</h1>

        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($pokemons as $pokemon)
                <li class="border border-gray-300 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <a href="{{ route('homepage.pokemons.show', $pokemon->id) }}">
                        <img src="{{ Storage::url($pokemon->img_path) }}"
                             alt="image du pokemon"
                             class="w-full h-48 object-cover object-center"
                        />
                    </a>
                    <div class="p-4 bg-white">
                        <h2 class="font-bold text-xl mb-2">{{ $pokemon->nom }}</h2>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-700">PV: {{ $pokemon->pv }}</p>
                            <p class="text-gray-700">Poids: {{ $pokemon->poids }} kg</p>
                        </div>
                        <p class="text-gray-700 mt-2">Taille: {{ $pokemon->taille }} m</p>
                    </div>
                </li>
            @endforeach
        </ul>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $pokemons->links() }}
        </div>
    </div>
</x-guest-layout>
