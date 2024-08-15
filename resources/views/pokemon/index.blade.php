{{-- pokemon.index.blade --}}

<x-app-layout>


    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-white">Tableau des Pokemon</h2>
                    <a href="{{ route('pokemon.create') }}" class="font-bold py-2 px-4 rounded" style="background-color: #D32F2F; color: white; hover:bg-red-700">
                        Ajouter un Pokemon
                    </a>
                </div>
                <div class="mt-6 text-gray-300 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700 border border-gray-600 rounded-lg">
                        <thead class="bg-black">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nom</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Photo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">PV</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Poids</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Taille</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Modifier</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-600">
                            @foreach ($pokemons as $pokemon)
                                <tr class="hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->nom }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="cursor-pointer" onclick="showImage('{{ Storage::url($pokemon->img_path) }}')">
                                            <img src="{{ Storage::url($pokemon->img_path) }}"
                                                alt="{{ $pokemon->nom }}" class="w-16 h-16 rounded">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->pv }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->poids }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pokemon->taille }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('pokemon.edit', $pokemon->id) }}"
                                            class="text-yellow-500 hover:text-yellow-400">Éditer</a>
                                        <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-700 ml-4">Supprimer</button>
                                        </form>
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

    <!-- Modal de confirmation -->
    <x-modal name="confirm-pokemon-deletion" focusable>
        <form method="POST" onsubmit="event.target.action = '/pokemon/' + window.selected" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Êtes-vous sûr de vouloir supprimer ce Pokemon ?
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Cette action est irréversible. Toutes les données seront supprimées.
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Annuler
                </x-secondary-button>

                <x-danger-button class="ml-3" type="submit">
                    Supprimer
                </x-danger-button>
            </div>
        </form>
    </x-modal>


</x-app-layout>
