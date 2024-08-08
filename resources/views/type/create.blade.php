
{{-- type/create --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-500 leading-tight">
            {{ __('Créer un nouveau Type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('type.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <!-- Type Nom -->
                        <div>
                            <x-input-label for="nom" :value="__('Type')" class="text-red-300"/>
                            <x-text-input id="nom" class="block mt-1 w-full bg-gray-700 border-red-500 text-white" type="text" name="nom" :value="old('nom')" required autofocus />
                            <x-input-error :messages="$errors->get('nom')" class="mt-2 text-yellow-300" />
                        </div>
                    </div>

                     <!-- Type Image -->
                    <div>
                        <x-input-label for="type_img_path" :value="__('Type Image')" class="text-red-300"/>
                        <x-text-input id="type_img_path" class="block mt-1 w-full bg-gray-700 border-red-500 text-white" type="file" name="type_img_path" />
                        <x-input-error :messages="$errors->get('type_img_path')" class="mt-2 text-yellow-300" />
                    </div>

                    <!-- Type Color -->
                    <div>
                        <x-input-label for="couleur" :value="__('Couleur')" class="text-red-300"/>
                        <x-text-input id="couleur" class="block mt-1 w-full bg-gray-700 border-red-500 text-white" type="text" name="couleur" :value="old('couleur')" required />
                        <x-input-error :messages="$errors->get('couleur')" class="mt-2 text-yellow-300" />
                    </div>

                    <div class="flex justify-end">
                        <!-- Submit Button -->
                        <x-primary-button class="bg-red-600 hover:bg-red-700">
                            {{ __('Ajouter un nouveau Type') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


