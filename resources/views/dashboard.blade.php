<x-app-layout>
    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">Bienvenue dans le Pokedex World</h1>
                    <h2 class="text-2xl font-bold text-white">Tableau récapitulatif</h2>
                </div>
                <div class="mt-6 text-gray-300">
                    <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                        {{-- TABLEAU --}}
                        <div class="mt-6 text-gray-300 overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700 border border-gray-600 rounded-lg">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nom Pokemon</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Photo Pokemon</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">PV</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Poids</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Taille</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Type Principal</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Photo Type Principal</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Couleur Type Principal</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Type Secondaire</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Photo Type Secondaire</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Couleur Type Secondaire</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Attaque Principale</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Photo Attaque Principale</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Dégâts Attaque Principale</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Attaque Secondaire</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Photo Attaque Secondaire</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Dégâts Attaque Secondaire</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-600">
                                    @foreach ($pokemons as $pokemon)
                                    <tr class="hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->nom }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="cursor-pointer" onclick="showImage('{{ Storage::url($pokemon->img_path) }}')">
                                                <img src="{{ Storage::url($pokemon->img_path) }}" alt="{{ $pokemon->nom }}" class="w-16 h-16 rounded">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->pv }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->poids }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->taille }}</td>

                                        {{-- Type Principal --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->types->get(0)->nom ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($pokemon->types->get(0))
                                            <img src="{{ Storage::url($pokemon->types->get(0)->img_path) }}" alt="{{ $pokemon->types->get(0)->nom }}" class="w-16 h-16 rounded">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->types->get(0)->couleur ?? '' }}
                                        </td>

                                        {{-- Type Optionnel --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->types->get(1)->nom ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($pokemon->types->get(1))
                                            <img src="{{ Storage::url($pokemon->types->get(1)->img_path) }}" alt="{{ $pokemon->types->get(1)->nom }}" class="w-16 h-16 rounded">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->types->get(1)->couleur ?? '' }}
                                        </td>

                                        {{-- Attaque Principale --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->attaques->get(0)->nom ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($pokemon->attaques->get(0))
                                            <img src="{{ Storage::url($pokemon->attaques->get(0)->img_path) }}" alt="{{ $pokemon->attaques->get(0)->nom }}" class="w-16 h-16 rounded">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->attaques->get(0)->dégâts ?? '' }}
                                        </td>

                                        {{-- Attaque Secondaire --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->attaques->get(1)->nom ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($pokemon->attaques->get(1))
                                            <img src="{{ Storage::url($pokemon->attaques->get(1)->img_path) }}" alt="{{ $pokemon->attaques->get(1)->nom }}" class="w-16 h-16 rounded">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->attaques->get(1)->dégâts ?? '' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $pokemons->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
