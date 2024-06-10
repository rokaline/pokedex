<!-- resources/views/pokemon/index.blade.php -->

@foreach ($pokemons as $pokemon)
    <div>
        <a href="{{ route('pokemons.show', $pokemon->id) }}">
            <img src="{{ asset('storage/' . $pokemon->img_path) }}" alt="image du pokemon">
        </a>
        <h2>{{ $pokemon->pokemon }}</h2>
    </div>
@endforeach
