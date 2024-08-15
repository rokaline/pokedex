{{-- pokemon.edit.blade --}}

<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between mt-8">
                    <div class="text-2xl text-white">
                        Modifier un Type
                    </div>
                </div>

            <div class="text-gray-500">
                <form method="POST" action="{{ route('pokemon.update', $pokemon) }}" enctype="multipart/form-data" class="flex flex-col space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Pokémon Name -->
                    <div>
                        <x-input-label for="nom" :value="__('Nom Pokémon')"  class="text-red-300"/>
                        <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom', $pokemon->nom)" required autofocus />
                        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                    </div>

                    <!-- Pokémon Image -->
                    <div>
                        <x-input-label for="img_path" :value="__('Image Pokémon')"  class="text-red-300"/>
                        <x-text-input id="img_path" class="block mt-1 w-full" type="file" name="img_path" />
                        <x-input-error :messages="$errors->get('img_path')" class="mt-2" />
                    </div>

                    <!-- Pokémon PV -->
                    <div>
                        <x-input-label for="pv" :value="__('PV')"  class="text-red-300"/>
                        <x-text-input id="pv" class="block mt-1 w-full" type="number" name="pv" :value="old('pv', $pokemon->pv)" required />
                        <x-input-error :messages="$errors->get('pv')" class="mt-2" />
                    </div>

                    <!-- Pokémon Weight -->
                    <div>
                        <x-input-label for="poids" :value="__('Poids')"  class="text-red-300"/>
                        <x-text-input id="poids" class="block mt-1 w-full" type="number" step="0.1" name="poids" :value="old('poids', $pokemon->poids)" required />
                        <x-input-error :messages="$errors->get('poids')" class="mt-2" />
                    </div>

                    <!-- Pokémon Height -->
                    <div>
                        <x-input-label for="taille" :value="__('Taille')"  class="text-red-300"/>
                        <x-text-input id="taille" class="block mt-1 w-full" type="number" step="0.1" name="taille" :value="old('taille', $pokemon->taille)" required />
                        <x-input-error :messages="$errors->get('taille')" class="mt-2" />
                    </div>


                    {{--    ------  ------------------------MUST HAVE------------------------------- --}}

                    <!-- Type Obligatoire -->
                    <div>
                        <x-input-label for="type_obligatoire" :value="__('Type Obligatoire')"  class="text-red-300"/>
                        <select name="type_obligatoire" id="type_obligatoire" class="border border-red-500 rounded shadow px-4 py-2 w-full">
                            <option value="">Sélectionnez un type obligatoire</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_obligatoire', $pokemon->types->first()?->id) == $type->id ? 'selected' : '' }}>
                                    {{ $type->nom }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('type_obligatoire')" class="mt-2" />
                    </div>


                    <!-- Attaque Obligatoire -->
                    <div>
                        <x-input-label for="attaque_obligatoire" :value="__('Attaque Obligatoire')"  class="text-red-300"/>
                        <select name="attaque_obligatoire" id="attaque_obligatoire" class="border border-red-500 rounded shadow px-4 py-2 w-full">
                            <option value="">Sélectionnez une attaque obligatoire</option>
                            @foreach($attaques as $attaque)
                                <option value="{{ $attaque->id }}" {{ old('attaque_obligatoire', $pokemon->attaques->first()?->id) == $attaque->id ? 'selected' : '' }}>
                                    {{ $attaque->nom }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('attaque_obligatoire')" class="mt-2" />
                    </div>




                    {{--    ------  ------------------------OPTION------------------------------- --}}

                    <!-- NOM Type Optionnel -->
                    <div>
                        <x-input-label for="type_optionnel" :value="__('Type Optionnel')"  class="text-red-300"/>
                        <select name="type_optionnel" id="type_optionnel" class="border border-red-500 rounded shadow px-4 py-2 w-full">
                            <option value="">Sélectionnez un type optionnel</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_optionnel', $pokemon->types->count() > 1 ? $pokemon->types->get(1)->id : null) == $type->id ? 'selected' : '' }}>
                                    {{ $type->nom }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('type_optionnel')" class="mt-2" />
                    </div>

                    <!-- Attaque Optionnelle -->
                    <div>
                        <x-input-label for="attaque_optionnelle" :value="__('Attaque Optionnelle')"  class="text-red-300"/>
                        <select name="attaque_optionnelle" id="attaque_optionnelle" class="border border-red-500 rounded shadow px-4 py-2 w-full">
                            <option value="">Sélectionnez une attaque optionnelle</option>
                            @foreach($attaques as $attaque)
                                <option value="{{ $attaque->id }}" {{ old('attaque_optionnelle', $pokemon->attaques->count() > 1 ? $pokemon->attaques->get(1)->id : null) == $attaque->id ? 'selected' : '' }}>
                                    {{ $attaque->nom }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('attaque_optionnelle')" class="mt-2" />
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
