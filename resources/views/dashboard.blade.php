{{-- dashboard.blade.php --}}
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-white">Bienvenue dans le Pokedex World</h2>
                </div>
                <div class="mt-6 text-gray-300">

                    <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">


                        {{-- TABLEAU --}}
                        <div class="mt-6 text-gray-300 overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700 border border-gray-600 rounded-lg">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nom</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Photo</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">PV</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Poids</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Taille</th>
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
