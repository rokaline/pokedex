{{-- dashboard.blade.php --}}
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-white">Bienvenue dans le Pokedex World</h2>
                </div>
                <div class="mt-6 text-gray-300">

                <div class="mt-8">
                    <a href="{{ route('homepage.index') }}" class="font-bold py-2 px-4 rounded" style="background-color: #D32F2F; color: white;">
                        Voir tous les Pokémon
                    </a>
                </div>

                <div class="mt-8">
                    <a href="{{ route('type.index') }}" class="font-bold py-2 px-4 rounded" style="background-color: #D32F2F; color: white;">
                        Voir tous les types
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
