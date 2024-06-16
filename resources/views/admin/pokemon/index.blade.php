<x-app-layout>
    <!-- Slot pour le header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pokemons') }}
        </h2>
    </x-slot>

    <!-- Contenu principal -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <!-- Section du titre et des boutons d'action -->
                    <div class="flex justify-between mt-8">
                        <div class="text-2xl">
                            Tableau Pokemon (views/admin/pokemon/ondex)
                        </div>
                        <!-- Bouton "Liste des Pokémon" -->
                        <div class="flex items-center justify-center space-x-8">
                            <a href="{{ route('pokemons.create') }}"
                                class="text-gray-500 font-bold py-2 px-4 rounded hover:bg-gray-200 transition">
                                Liste des Pokémon
                            </a>
                        </div>
                        <!-- Bouton "Modifier un Pokémon" -->
                        <div class="flex items-center justify-center space-x-8">
                            <a href="{{ route('pokemons.create') }}"
                                class="text-gray-500 font-bold py-2 px-4 rounded hover:bg-gray-200 transition flex items-center">
                                <x-heroicon-o-plus class="w-4 h-4 mr-2" />
                                Modifier un Pokemon
                            </a>
                        </div>
                    </div>


                    {{-- <a href="{{ route('admin.pokemon.index', $pokemon->id) }}"> --}}
                    <!-- Tableau des Pokémon -->
                    <div class="mt-6 text-gray-500">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="uppercase text-left">
                                    <th class="px-4 py-2 border">Nom du Pokémon</th>
                                    <th class="px-4 py-2 border">Photo</th>
                                    <th class="px-4 py-2 border">PV</th>
                                    <th class="px-4 py-2 border">Poids</th>
                                    <th class="px-4 py-2 border">Taille</th>
                                    <th class="px-4 py-2 border">Type de Pokémon</th>
                                    <th class="px-4 py-2 border">Couleur</th>
                                    <th class="px-4 py-2 border">Type d'attaque</th>
                                    <th class="px-4 py-2 border">Dégâts</th>
                                    <th class="px-4 py-2 border">Description</th>
                                    <th class="px-4 py-2 border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pokemons as $pokemon)
                                    <tr class="hover:bg-gray-50 odd:bg-gray-100 hover:odd:bg-gray-200 transition">
                                        <td class="border px-4 py-2">{{ $pokemon->nom }}</td>
                                        <td class="border px-4 py-2">
                                            <img src="{{ Storage::url($pokemon->img_path) }}" alt="{{ $pokemon->nom }}" class="w-16 h-16">
                                        </td>
                                        <td class="border px-4 py-2">{{ $pokemon->pv }}</td>
                                        <td class="border px-4 py-2">{{ $pokemon->poids }}</td>
                                        <td class="border px-4 py-2">{{ $pokemon->taille }}</td>
                                        <td class="border px-4 py-2">
                                            <!-- Types de Pokémon -->
                                            @if ($pokemon->types)
                                                @foreach ($pokemon->types as $type)
                                                    {{ $type->nom }}@if (!$loop->last), @endif
                                                @endforeach
                                            @else
                                                Aucun type disponible pour ce Pokémon.
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            <!-- Couleurs des types -->
                                            @if ($pokemon->types)
                                                @foreach ($pokemon->types as $type)
                                                    {{ $type->couleur }}@if (!$loop->last), @endif
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            <!-- Attaques du Pokémon -->
                                            @if ($pokemon->attaques)
                                                @foreach ($pokemon->attaques as $attaque)
                                                    {{ $attaque->nom }}@if (!$loop->last), @endif
                                                @endforeach
                                            @else
                                                Aucune attaque disponible pour ce Pokémon.
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            <!-- Dégâts des attaques -->
                                            @if ($pokemon->attaques)
                                                @foreach ($pokemon->attaques as $attaque)
                                                    {{ $attaque->dégât }}@if (!$loop->last), @endif
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            <!-- Descriptions des attaques -->
                                            @if ($pokemon->attaques)
                                                @foreach ($pokemon->attaques as $attaque)
                                                    {{ $attaque->description }}@if (!$loop->last), @endif
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2 space-x-4">
                                            <!-- Actions (Édition et Suppression) -->
                                            <div class="flex space-x-4">
                                                <!-- Édition -->
                                                <a href="{{ route('pokemons.edit', $pokemon->id) }}" class="text-blue-400">
                                                    <x-heroicon-o-pencil class="w-5 h-5" />
                                                </a>
                                                <!-- Suppression (avec confirmation) -->
                                                <button
                                                    x-data="{ id: {{ $pokemon->id }} }"
                                                    x-on:click.prevent="window.selected = id; $dispatch('open-modal', 'confirm-article-deletion');"
                                                    type="submit"
                                                    class="text-red-400"
                                                >
                                                    <x-heroicon-o-trash class="w-5 h-5" />
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $pokemons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
