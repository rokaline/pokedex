<!-- resources/views/pokemon/index.blade.php -->

<x-app-layout>

    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Pokemon') }}
       </h2>

   </x-slot>

   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                   <div class="flex justify-between mt-8">
                       <div class=" text-2xl">
                           Liste des Pokemon (pour visiteurs)
                       </div>

                       {{-- pour ajouter pokemon --}}
                       {{-- <div class="flex  items-center justify-center space-x-8">
                           <a href="{{ route('pokemons.create') }}"
                               class="text-gray-500 font-bold py-2 px-4 rounded hover:bg-gray-200 transition">Ajouter un
                               pokemon</a>
                       </div> --}}
                   </div>

                   <div class="mt-6 text-gray-500">
                       <table class="table-auto w-full">
                           <thead>
                               <tr class="uppercase text-left">

                                   <th class="px-4 py-2 border">Nom du Pokemon</th>
                                   <th class="px-4 py-2 border">Photo</th>
                                   <th class="px-4 py-2 border">PV</th>
                                   <th class="px-4 py-2 border">Poids</th>
                                   <th class="px-4 py-2 border">Taille</th>

                                   <th class="px-4 py-2 border">Type de Pokemon</th>
                                   <th class="px-4 py-2 border">Couleur</th>

                                   <th class="px-4 py-2 border">Type d'attaque</th>
                                   <th class="px-4 py-2 border">Dégats</th>
                                   <th class="px-4 py-2 border">Description</th>

                               </tr>
                           </thead>

                           <tbody>
                               @foreach ($pokemons as $pokemon)

                                   <tr class="hover:bg-gray-50 odd:bg-gray-100 hover:odd:bg-gray-200 transition">

                                       <td class="border px-4 py-2">
                                           {{ $pokemon->nom }}
                                       </td>
                                       <td class="border px-4 py-2">
                                           <img src="{{ Storage::url($pokemon->img_path) }}" alt="une licorne " class="w-16 h-16">
                                       </td>
                                       <td class="border px-4 py-2">
                                           {{ $pokemon->pv }}
                                       </td>
                                       <td class="border px-4 py-2">
                                           {{ $pokemon->poids }}
                                       </td>
                                       <td class="border px-4 py-2">
                                           {{ $pokemon->taille }}
                                       </td>

                                       {{-- Types --}}
                                       <td class="border px-4 py-2">
                                           @if ($pokemon->types)
                                               @foreach ($pokemon->types as $type)
                                                   {{ $type->nom }}
                                                   @if (!$loop->last), @endif
                                               @endforeach
                                           @else
                                               Aucun type disponible pour ce Pokémon.
                                           @endif
                                       </td>
                                       <td class="border px-4 py-2">
                                           @if ($pokemon->types)
                                               @foreach ($pokemon->types as $type)
                                                   {{ $type->couleur }}
                                                   @if (!$loop->last), @endif
                                               @endforeach
                                           @else
                                               -
                                           @endif
                                       </td>
                                       {{-- Attaques --}}
                                       <td class="border px-4 py-2">
                                           @if ($pokemon->attaques)
                                               @foreach ($pokemon->attaques as $attaque)
                                                   {{ $attaque->nom }}
                                                   @if (!$loop->last), @endif
                                               @endforeach
                                           @else
                                               Aucune attaque disponible pour ce Pokémon.
                                           @endif
                                       </td>
                                       <td class="border px-4 py-2">
                                           @if ($pokemon->attaques)
                                               @foreach ($pokemon->attaques as $attaque)
                                                   {{ $attaque->dégât }}
                                                   @if (!$loop->last), @endif
                                               @endforeach
                                           @else
                                               -
                                           @endif
                                       </td>
                                       <td class="border px-4 py-2">
                                           @if ($pokemon->attaques)
                                               @foreach ($pokemon->attaques as $attaque)
                                                   {{ $attaque->description }}
                                                   @if (!$loop->last), @endif
                                               @endforeach
                                           @else
                                               -
                                           @endif


                                           colonne supression
                                           <a href="{{ route('pokemons.edit', $pokemon->id) }}"
                                            class="text-blue-400">Edit</a>
                                        <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                       <div class="mt-4">
                           {{ $pokemons->links() }}
                       </div> -
                   </div>
               </div>
           </div>
       </div>
   </div>

</x-app-layout>

