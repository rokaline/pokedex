{{-- attaque/index.blade --}}
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-white">Tableau des Attaques</h2>
                    <a href="{{ route('attaque.create') }}" class="font-bold py-2 px-4 rounded" style="background-color: #D32F2F; color: white; hover:bg-red-700">
                        Ajouter une Attaque
                    </a>
                </div>
                <div class="mt-6 text-gray-300 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700 border border-gray-600 rounded-lg">
                        <thead class="bg-black">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nom</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Photo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Dégâts</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Description</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Modification</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-50 divide-y divide-gray-600">
                            @foreach ($attaques as $attaque)
                            <tr class="hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $attaque->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $attaque->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ Storage::url($attaque->img_path) }}" alt="{{ $attaque->nom }}" class="w-16 h-16 rounded">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $attaque->dégâts }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $attaque->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('attaque.edit', $attaque->id) }}" class="text-red-500 hover:text-red-400">Éditer</a>
                                    <form action="{{ route('attaque.destroy', $attaque->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 ml-4">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-8">
                    {{ $attaques->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
