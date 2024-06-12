<!-- resources/views/pokemon/index.blade.php -->

@foreach ($pokemons as $pokemon)
    <div>
        <a href="{{ route('pokemons.show', $pokemon->id) }}">
            {{-- <img src="{{ asset('storage/' . $pokemon->img_path) }}" alt="image du pokemon"> --}}
        </a>


        <!-- Ajout de l'image de l'article -->
9.	        <img src="{{ Storage::url($pokemon->img_path) }}" alt="image du pokemon">

        <h2>{{ $pokemon->pokemon }}</h2>
    </div>
@endforeach
