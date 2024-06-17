<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pokemons') }}
        </h2>
    </x-slot>


    POKEMON/index
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">Liste des Pokémon (pour visiteurs)</h2>
                    </div>
                        {{-- Bouton d'ajout de Pokémon --}}

                        <div> <a href="{{ route('pokemon.create') }}" class="text-gray-500 font-bold py-2 px-4 rounded hover:bg-gray-200 transition duration-200">
                            Ajouter un Pokémon
                        </a>
                    </div>
                    <div class="mt-6 text-gray-500 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Photo
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        PV
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Poids
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Taille
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type de Pokémon
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Couleur
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type d'attaque
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dégâts
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($pokemons as $pokemon)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->nom }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="cursor-pointer" onclick="showImage('{{ Storage::url($pokemon->img_path) }}')">
                                                <img src="{{ Storage::url($pokemon->img_path) }}"
                                                    alt="{{ $pokemon->nom }}" class="w-16 h-16">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->pv }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->poids }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $pokemon->taille }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @foreach ($pokemon->types as $type)
                                                <span
                                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                                    {{ $type->nom }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @foreach ($pokemon->types as $type)
                                                <span
                                                    class="inline-block bg-{{ $type->couleur }}-200 text-{{ $type->couleur }}-800 rounded-full px-3 py-1 text-sm font-semibold">
                                                    {{ $type->couleur }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @foreach ($pokemon->attaques as $attaque)
                                                <span
                                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                                    {{ $attaque->nom }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @foreach ($pokemon->attaques as $attaque)
                                                <span
                                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                                    {{ $attaque->dégâts }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @foreach ($pokemon->attaques as $attaque)
                                                {{ $attaque->description }}
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('pokemons.edit', $pokemon->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Éditer</a>
                                            <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 ml-4">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div id="imageModal"
                            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 flex justify-center items-center hidden">
                            <div class="bg-white rounded-lg p-4 max-w-lg max-h-full overflow-auto">
                                <img src="" alt="" id="modalImage" class="mx-auto max-w-full max-h-full">
                                <div class="text-right mt-4">
                                    <button onclick="hideImage()"
                                        class="text-gray-500 hover:text-gray-700 focus:outline-none">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showImage(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function hideImage() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>

</x-app-layout>
