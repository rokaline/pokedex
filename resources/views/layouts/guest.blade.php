{{-- navigation pour tous --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-white">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-black text-red-600 py-4">
            <div class="container mx-auto flex justify-between items-center px-4">
                {{-- <!-- Logo -->
                <a href="/" class="group font-bold text-3xl flex items-center space-x-4 hover:text-red-500 transition">
                    <img src="images/boule.jpg" alt="Logo" class="w-10 h-10 fill-current text-gray-500 group-hover:text-yellow-500 transition" />
                    <span class="ml-2">Pokedex World</span>
                </a> --}}

                <!-- Liens de navigation -->
                <div class="flex items-center space-x-6">

                    {{-- LOGIN --}}
                    <a href="{{ route('login') }}" class="font-bold hover:text-yellow-600 transition">Login</a>

                    {{-- HOMEPAGE --}}
                    <a href="{{ route('homepage.index') }}" class="font-bold hover:text-yellow-600 transition">Homepage</a>

                    {{-- FILTRE --}}
                    {{-- <a href="{{ route('filter.index') }}" class="font-bold hover:text-yellow-600 transition">Recherches</a>  --}}


                    <!-- Ajouter d'autres liens de navigation ici si nécessaire -->
                </div>
            </div>
        </nav>

        <!-- Contenu principal -->
        <main class="flex-1">
            <div class="container mx-auto py-6 px-4">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-black py-5">
            <div class="container mx-auto flex justify-center items-center space-x-4">
                <a href="https://www.pokemon.com/us/pokedex" class="font-bold text-red-600 hover:text-white transition">Site officiel Pokemon</a>
            </div>
        </footer>
    </div>
</body>

</html>
