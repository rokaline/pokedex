<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class=" text-2xl">
                    Créer un article
                </div>
            </div>

            <form method="POST" action="{{ route('pokemons.store') }}" class="flex flex-col space-y-4 text-gray-500">

                @csrf

        </div>
    </div>
</x-app-layout>
