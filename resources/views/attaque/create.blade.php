{{-- attaque/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouvelle Attaque') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="text-2xl mb-4">
                Ajout Attaque
            </div>

            <form method="POST" action="{{ route('attaque.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Pokémon Attack Name -->
                <div>
                    <x-input-label for="attaque_nom" :value="__('Nom Attaque')" />
                    <x-text-input id="attaque_nom" class="block mt-1 w-full" type="text" name="attaque_nom" :value="old('attaque_nom')" required />
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
                        {{ __('Créer Attaque') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
