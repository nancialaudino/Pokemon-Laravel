<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PokeMarket')</title>
    {{--<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <img class="logo-img" src="{{ asset('images/logo.png') }}" alt="pokemarket logo">

            </div>
            <nav class="nav">
                <button class="nav-btn active" onclick="window.location.href='{{url('/')}}'">Accueil</button>
                <button class="nav-btn" onclick="window.location.href='{{url('/catalogue')}}'">Pokémon</button>
                <button class="nav-btn" onclick="window.location.href='{{url('/admin')}}'">Admin</button>
                <button class="nav-btn download">Download</button>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>
    <footer class="header">
        <h1></h1>

    </footer>

    {{--<script src="{{ asset('resources/js/app.js') }}"></script>--}}

</body>
</html>