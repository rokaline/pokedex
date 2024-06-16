<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pokemons') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class="text-2xl">
                    Modifier un Pokémon
                </div>
            </div>

            <div class="text-gray-500">
                <form method="POST" action="{{ route('pokemons.update', $pokemon->id) }}" enctype="multipart/form-data" class="flex flex-col space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="nom" :value="__('Nom du Pokémon')" />
                        <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom', $pokemon->nom)" autofocus />
                        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="pv" :value="__('PV')" />
                        <x-input id="pv" class="block mt-1 w-full" type="number" name="pv" :value="old('pv', $pokemon->pv)" />
                        <x-input-error :messages="$errors->get('pv')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="poids" :value="__('Poids')" />
                        <x-input id="poids" class="block mt-1 w-full" type="number" name="poids" :value="old('poids', $pokemon->poids)" />
                        <x-input-error :messages="$errors->get('poids')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="taille" :value="__('Taille')" />
                        <x-input id="taille" class="block mt-1 w-full" type="number" name="taille" :value="old('taille', $pokemon->taille)" />
                        <x-input-error :messages="$errors->get('taille')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="couleur" :value="__('Couleur')" />
                        <x-input id="couleur" class="block mt-1 w-full" type="text" name="couleur" :value="old('couleur', $pokemon->couleur)" />
                        <x-input-error :messages="$errors->get('couleur')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="attaque" :value="__('Type d\'attaque')" />
                        <x-input id="attaque" class="block mt-1 w-full" type="text" name="attaque" :value="old('attaque', $pokemon->attaque)" />
                        <x-input-error :messages="$errors->get('attaque')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="dégâts" :value="__('Dégâts de l\'attaque')" />
                        <x-input id="dégâts" class="block mt-1 w-full" type="number" name="dégâts" :value="old('dégâts', $pokemon->dégâts)" />
                        <x-input-error :messages="$errors->get('dégâts')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description de l\'attaque')" />
                        <textarea id="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="description" rows="5">{{ old('description', $pokemon->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="img_path" :value="__('Image du Pokémon')" />
                        <input id="img_path" class="block mt-1 w-full" type="file" name="img_path" accept="image/jpeg,image/png,image/jpg,image/gif" />
                        <x-input-error :messages="$errors->get('img_path')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button type="submit">
                            {{ __('Modifier') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
