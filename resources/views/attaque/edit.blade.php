{{-- attaque/edit.blade.php --}}

<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between mt-8">
                    <div class="text-2xl text-white">
                        Modifier une Attaque
                    </div>
                </div>

            <div class="text-gray-300">
            <form method="POST" action="{{ route('attaque.update', $attaque) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nom Attaque -->
                <div>
                    <x-input-label for="nom" :value="__('Nom Attaque')"  class="text-red-300"/>
                    <x-text-input id="nom" class="block mt-1 w-full bg-gray-700 border border-red-500 text-white"  type="text" name="nom" :value="old('nom', $attaque->nom)" required />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2 text-yellow-300" />
                </div>

                <!-- Image Attaque -->
                <div>
                    <x-input-label for="attaque_img_path" :value="__('Image Attaque')"  class="text-red-300"/>
                    <x-text-input id="attaque_img_path" class="block mt-1 w-full bg-gray-700 border border-red-500 text-white"  type="file" name="attaque_img_path" />
                    <x-input-error :messages="$errors->get('attaque_img_path')" class="mt-2 text-yellow-300" />
                </div>

                <!-- Dégâts Attaque -->
                <div>
                    <x-input-label for="dégâts" :value="__('Dégâts')"  class="text-red-300"/>
                    <x-text-input id="dégâts" class="block mt-1 w-full bg-gray-700 border border-red-500 text-white"  type="number" name="dégâts" :value="old('dégâts', $attaque->dégâts)" required />
                    <x-input-error :messages="$errors->get('dégâts')" class="mt-2 text-yellow-300" />
                </div>

                <!-- Description Attaque -->
                <div>
                    <x-input-label for="description" :value="__('Description')"  class="text-red-300"/>
                    <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-700 border border-red-500 text-white">{{ old('description', $attaque->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2 text-yellow-300" />
                </div>

                <!-- Type Attaque -->
                <div>
                    <x-input-label for="type_id" :value="__('Type')"  class="text-red-300"/>
                    <select id="type_id" name="type_id" class="block mt-1 w-full bg-gray-700 rounded-md  border border-red-500 text-white"  type="text" name="nom">
                        <option value="">Sélectionner un type</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id', $attaque->type_id) == $type->id ? 'selected' : '' }}>{{ $type->nom }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('type_id')" class="mt-2 text-yellow-300" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <x-primary-button type="submit" class="bg-red-600 hover:bg-red-700">
                        {{ __('Modifier une Attaque') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
