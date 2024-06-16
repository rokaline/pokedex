
{{-- guest.blade.php --}}


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
    <div class="min-h-screen flex flex-col pt-6 sm:pt-0">
        <div class="container mx-auto flex flex-col space-y-10">
            <nav class="flex justify-between items-center py-2 bg-black text-red-600">
                {{-- <div>
                    <a href="/" class="group font-bold text-3xl flex items-center space-x-4 hover:text-emerald-600 transition">
                        <img src="images/boule.jpg" alt="Logo" class="w-10 h-10 fill-current text-gray-500 group-hover:text-yellow-500 transition" />
                        <span class="ml-8">Pokedex World</span>
                    </a>

                </div> --}}
                {{-- <div class="flex items-center space-x-4 justify-end">
                    <a class="font-bold hover:text-yellow-600 transition" href="/">guest.blade.php (Pokemon)</a>
                </div> --}}

                <div class="flex items-center space-x-4 justify-end">
                    <a class="font-bold hover:text-yellow-600 transition" href="{{route('login') }}">Login</a>
                </div>



            </nav>



            {{-- liste des pokemon
            <a class="font-bold text-lg text-red-600 hover:text-black transition" href="{{ route('pokemons.index') }}">
                Pokemon
            </a> --}}




            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="flex justify-center items-center space-x-4 py-5 bg-black mt-16">
            <a href="https://www.pokemon.com/us/pokedex" class="font-bold text-red-600 hover:text-white-600 transition">
               Site officiel Pokemon
            </a>
        </footer>
    </div>
</body>

</html>

</html>
