<!-- resources/views/pokemon/index.blade.php -->

@foreach ($pokemons as $pokemon)
    <div>
        <a href="{{ route('homepage.pokemons.show', $pokemon->id) }}">
            {{-- <img src="{{ asset('storage/' . $pokemon->img_path) }}" alt="image du pokemon"> --}}
        </a>


        <!-- Ajout de l'image de l'article -->
9.	        <img src="{{ Storage::url($pokemon->img_path) }}" alt="image du pokemon">

        <h2>{{ $pokemon->pokemon }}</h2>
    </div>

    <div class="mt-4">
        {{ $pokemons->links() }}
    </div>
@endforeach
