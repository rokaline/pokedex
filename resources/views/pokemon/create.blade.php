{{-- resources/views/pokemon/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouveau Pokémon') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="text-2xl mb-4">
                Ajout Pokémon
            </div>

            <form method="POST" action="{{ route('pokemon.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <!-- Pokémon Name -->
                <div>
                    <x-input-label for="nom" :value="__('Nom Pokémon')" />
                    <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>

                <!-- Pokémon Image -->
                <div>
                    <x-input-label for="img_path" :value="__('Image Pokémon')" />
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

                <!-- Type Obligatoire -->
                <div>
                    <x-input-label for="type_obligatoire" :value="__('Type Obligatoire')" />
                    <select name="type_obligatoire" id="type_obligatoire" class="border border-red-500 rounded shadow px-4 py-2 w-full">
                        <option value="">Sélectionnez un type obligatoire</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_obligatoire') == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('type_obligatoire')" class="mt-2" />
                </div>

                <!-- Type Optionnel -->
                <div>
                    <x-input-label for="type_optionnel" :value="__('Type Optionnel')" />
                    <select name="type_optionnel" id="type_optionnel" class="border border-red-500 rounded shadow px-4 py-2 w-full">
                        <option value="">Sélectionnez un type optionnel</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_optionnel') == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('type_optionnel')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <x-primary-button>
                        {{ __('Créer Pokémon') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
