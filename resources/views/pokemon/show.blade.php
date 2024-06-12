<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Pokemons</h1>
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" value="{{ $pokemon['nom'] }}" readonly>
        </div>

        <div class="form-group">
            <label for="height">Taille</label>
            <input type="text" class="form-control" id="height" value="{{ $pokemon['taille'] }}" readonly>
        </div>
        <div class="form-group">
            <label for="weight">Poids</label>
            <input type="text" class="form-control" id="weight" value="{{ $pokemon['poids'] }}" readonly>
        </div>

        {{-- ////////Type --}}
        <div class="form-group">
            <label for="types">Type</label>
            <ul class="list-group" id="types">
                @foreach($pokemon['types'] as $type)
                    <li class="list-group-item">{{ $type }}</li>
                @endforeach
            </ul>
        </div>


        {{-- ////////Attaque --}}
        <div class="form-group">
            <label for="attacks">Attaque</label>
            <ul class="list-group" id="attacks">
                @foreach($pokemon->attaques as $attaque)
                    <li class="list-group-item">{{ $attaque }}</li>
                @endforeach
            </ul>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" readonly>{{ $pokemon['description'] }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <div>
                <img src="{{ asset('images/'.$pokemon['img']) }}" alt="Pokemon Image" class="img-thumbnail" style="max-width: 200px;">
            </div>
        </div>
        <div class="form-group">
            <label for="upload">Charger l'image</label>
            <input type="file" class="form-control-file" id="upload" disabled>
        </div>


        <!-- Pagination pour naviguer entre les pages -->
        {{-- <div class="mt-8">
            Pagination pour naviguer entre les pages
        {{ $pokemons->links() }} <!-- Affichage des liens de pagination -->
        </div> --}}

        <a href="{{ route('homepage.pokemons.show', $pokemon->id) }}">
            {{-- <img src="{{ asset('storage/' . $pokemon->img_path) }}" alt="image du pokemon"> --}}
        </a>

    </div>
</body>
</html>
