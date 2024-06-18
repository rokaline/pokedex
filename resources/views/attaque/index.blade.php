
{{-- attaque/index.blade --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attaques Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Tableau Attaques</h2>
                    <a href="{{ route('attaque.create') }}" class="text-gray-500 font-bold py-2 px-4 rounded hover:bg-gray-200 transition duration-200">
                        Ajouter une Attaque
                    </a>
                </div>
                <div class="mt-6 text-gray-500">
                    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Degat</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modification</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($attaques as $attaque)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $attaque->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $attaque->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ Storage::url($attaque->img_path) }}" alt="{{ $attaque->nom }}" class="w-16 h-16 rounded">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $attaque->couleur }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('attaque.edit', $attaque->id) }}" class="text-indigo-600 hover:text-indigo-900">Éditer</a>
                                    <form action="{{ route('attaque.destroy', $attaque->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button attaque="submit" class="text-red-600 hover:text-red-900 ml-4">Supprimer</button>
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
