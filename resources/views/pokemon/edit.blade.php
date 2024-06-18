
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pokemon Section') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class=" text-2xl">
                    Modifier un Pokemon
                </div>
            </div>

            <div class="text-gray-500">
                <form method="POST" action="{{ route('pokemon.update', $pokemon) }}" class="flex flex-col space-y-4">

                    @csrf
                    @method('PUT')

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
