<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un nouveau Pokémon') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class="text-2xl">
                    Créer un Pokémon
                </div>
            </div>

            <form method="POST" action="{{ route('admin.pokemons.store') }}" class="flex flex-col space-y-4 text-gray-500">

                @csrf

                <div>
                    <x-input-label for="nom" :value="__('Nom du Pokémon')" />
                    <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom"
                        :value="old('nom')" autofocus />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="pv" :value="__('PV')" />
                    <x-text-input id="pv" class="block mt-1 w-full" type="number" name="pv"
                        :value="old('pv')" />
                    <x-input-error :messages="$errors->get('pv')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="poids" :value="__('Poids')" />
                    <x-text-input id="poids" class="block mt-1 w-full" type="text" name="poids"
                        :value="old('poids')" />
                    <x-input-error :messages="$errors->get('poids')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="taille" :value="__('Taille')" />
                    <x-text-input id="taille" class="block mt-1 w-full" type="text" name="taille"
                        :value="old('taille')" />
                    <x-input-error :messages="$errors->get('taille')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="img_path" :value="__('Chemin de l\'image')" />
                    <x-text-input id="img_path" class="block mt-1 w-full" type="text" name="img_path"
                        :value="old('img_path')" />
                    <x-input-error :messages="$errors->get('img_path')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        name="description" rows="6">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button type="submit">
                        {{ __('Créer') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
