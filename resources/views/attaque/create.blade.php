{{-- attaque/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-500 leading-tight">
            {{ __('Créer une nouvelle attaque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

            <form method="POST" action="{{ route('attaque.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Nom Attaque -->
                <div>
                    <x-input-label for="nom" :value="__('Nom Attaque')" class="text-red-300"/>
                    <x-text-input id="nom" class="block mt-1 w-full bg-gray-700 border-red-500 text-white"  type="text" name="nom" :value="old('nom')" required />
                    <x-input-error :messages="$errors->get('nom')" class="text-red-300" />
                </div>

                <!-- Image Attaque -->
                <div>
                    <x-input-label for="attaque_img_path" :value="__('Image Attaque')" class="text-red-300" />
                    <x-text-input id="type_img_path" class="block mt-1 w-full bg-gray-700 border-red-500 text-white" type="file" name="attaque_img_path" />
                    <x-input-error :messages="$errors->get('attaque_img_path')"  />
                </div>

                <!-- Dégâts Attaque -->
                <div>
                    <x-input-label for="dégâts" :value="__('Dégâts')" class="text-red-300"/>
                    <x-text-input id="type_img_path" class="block mt-1 w-full bg-gray-700 border-red-500 text-white"  type="number" name="dégâts" :value="old('dégâts')" required />
                    <x-input-error :messages="$errors->get('dégâts')"  />
                </div>

                <!-- Description Attaque -->
                <div>
                    <x-input-label for="description" :value="__('Description')"class="text-red-300" />
                    <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')"  />
                </div>

                <!-- Type Attaque -->
                <div>
                    <x-input-label for="type_id" :value="__('Type')" class="text-red-300"/>
                    <select id="type_id" name="type_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">Sélectionner un type</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->nom }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('type_id')"  />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <x-primary-button class="bg-red-600 hover:bg-red-700">
                        {{ __('Créer Attaque') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
