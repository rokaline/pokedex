{{-- type/edit.blade.php --}}


<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between mt-8">
                    <div class="text-2xl text-white">
                        Modifier un Type
                    </div>
                </div>

                <div class="text-gray-300">
                    <form method="POST" action="{{ route('type.update', $type) }}" enctype="multipart/form-data" class="flex flex-col space-y-4">

                        @csrf
                        @method('PUT')

                        <!-- Type Nom -->
                        <div>
                            <x-input-label for="nom" :value="__('Type')" class="text-red-300"/>
                            <x-text-input id="nom" class="block mt-1 w-full bg-gray-700 border border-red-500 text-white" type="text" name="nom" value="{{ old('nom', $type->nom) }}"  />
                            <x-input-error :messages="$errors->get('nom')" class="mt-2 text-yellow-300" />
                        </div>

                        <!-- Type Image -->
                        <div>
                            <x-input-label for="type_img_path" :value="__('Type Image')" class="text-red-300"/>
                            <x-text-input id="type_img_path" class="block mt-1 w-full bg-gray-700 border border-red-500 text-white" type="file" name="type_img_path" />
                            <x-input-error :messages="$errors->get('type_img_path')" class="mt-2 text-yellow-300" />
                        </div>

                        <!-- Type Color -->
                        <div>
                            <x-input-label for="couleur" :value="__('Couleur')" class="text-red-300"/>
                            <x-text-input id="couleur" class="block mt-1 w-full bg-gray-700 border border-red-500 text-white" type="text" name="couleur" value="{{ old('couleur', $type->couleur) }}"  />
                            <x-input-error :messages="$errors->get('couleur')" class="mt-2 text-yellow-300" />
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button type="submit" class="bg-red-600 hover:bg-red-700">
                                {{ __('Modifier') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






