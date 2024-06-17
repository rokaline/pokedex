<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('NouveauPokémon') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="text-2xl mb-4">
                Ajout Pokemon
            </div>

            <form method="POST" action="{{ route('pokemons.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Pokémon Name -->
                <div>
                    <x-input-label for="nom" :value="__('Nom Pokemon')" />
                    <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>

                <!-- Pokémon Image -->
                <div>
                    <x-input-label for="img_path" :value="__('Image POkemon')" />
                    <x-text-input id="img_path" class="block mt-1 w-full" type="file" name="img_path" required />
                    <x-input-error :messages="$errors->get('img_path')" class="mt-2" />
                </div>

                <!-- Pokémon PV -->
                <div>
                    <x-input-label for="pv" :value="__('PV')" />
                    <x-text-input id="pv" class="block mt-1 w-full" type="number" name="pv" :value="old('pv')" required />
                    <x-input-error :messages="$errors->get('pv')" class="mt-2" />
                </div>

                <!-- Pokémon Weight -->
                <div>
                    <x-input-label for="poids" :value="__('Poids')" />
                    <x-text-input id="poids" class="block mt-1 w-full" type="number" step="0.1" name="poids" :value="old('poids')" required />
                    <x-input-error :messages="$errors->get('poids')" class="mt-2" />
                </div>

                <!-- Pokémon Height -->
                <div>
                    <x-input-label for="taille" :value="__('Taille')" />
                    <x-text-input id="taille" class="block mt-1 w-full" type="number" step="0.1" name="taille" :value="old('taille')" required />
                    <x-input-error :messages="$errors->get('taille')" class="mt-2" />
                </div>

                <!-- Pokémon Type Name -->
                <div>
                    <x-input-label for="type_nom" :value="__('Type Pokemon')" />
                    <x-text-input id="type_nom" class="block mt-1 w-full" type="text" name="type_nom" :value="old('type_nom.0')" required />
                    <x-input-error :messages="$errors->get('type_nom')" class="mt-2" />
                </div>

                <!-- Pokémon Type Image -->
                <div>
                    <x-input-label for="type_img_path" :value="__('Type Image')" />
                    <x-text-input id="type_img_path" class="block mt-1 w-full" type="file" name="type_img_path" />
                    <x-input-error :messages="$errors->get('type_img_path')" class="mt-2" />
                </div>

                <!-- Pokémon Type Color -->
                <div>
                    <x-input-label for="couleur" :value="__('Couleur')" />
                    <x-text-input id="couleur" class="block mt-1 w-full" type="text" name="couleur" :value="old('couleur')" required />
                    <x-input-error :messages="$errors->get('couleur')" class="mt-2" />
                </div>

                <!-- Pokémon Attack Name -->
                <div>
                    <x-input-label for="attaque_nom" :value="__('Nom Attaque')" />
                    <x-text-input id="attaque_nom" class="block mt-1 w-full" type="text" name="attaque_nom" :value="old('attaque_nom.0')" required />
                    <x-input-error :messages="$errors->get('attaque_nom')" class="mt-2" />
                </div>

                <!-- Pokémon Attack Image -->
                <div>
                    <x-input-label for="attaque_img_path" :value="__('Attaque Image')" />
                    <x-text-input id="attaque_img_path" class="block mt-1 w-full" type="file" name="attaque_img_path" />
                    <x-input-error :messages="$errors->get('attaque_img_path')" class="mt-2" />
                </div>

                <!-- Pokémon Attack Damage -->
                <div>
                    <x-input-label for="dégâts" :value="__('Dégâts')" />
                    <x-text-input id="dégâts" class="block mt-1 w-full" type="number" name="dégâts" :value="old('dégâts')" required />
                    <x-input-error :messages="$errors->get('dégâts')" class="mt-2" />
                </div>

                <!-- Pokémon Attack Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <x-primary-button>
                        {{ __('Créer Pokemon') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
