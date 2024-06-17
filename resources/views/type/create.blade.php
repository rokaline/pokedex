<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un Type de Pokémon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('types.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <x-label for="name" :value="__('Nom')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-validation-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="type_img_path" :value="__('Image')" />
                        <x-input id="img_path" class="block mt-1 w-full" type="file" name="img_path" :value="old('img_path')" />
                        <x-validation-error :messages="$errors->get('type_img_path')" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="color" :value="__('Couleur')" />
                        <x-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')" required />
                        <x-validation-error :messages="$errors->get('color')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-button class="ml-3">
                            {{ __('Créer') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
