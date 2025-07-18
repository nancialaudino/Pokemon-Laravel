<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Debug: Mostrar informações do usuário 
                    <div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 rounded">
                        <p><strong>Debug Info:</strong></p>
                        <p>Nome: {{ Auth::user()->name }}</p>
                        <p>Email: {{ Auth::user()->email }}</p>
                        <p>Role: {{ Auth::user()->role ?? 'não definida' }}</p>
                        <p>É Admin?: {{ Auth::user()->role === 'admin' ? 'SIM' : 'NÃO' }}</p>
                    </div>

                    -->

                    @if(Auth::user()->role === 'admin')
                        <!-- Dashboard Admin -->
                        <div class="admin-dashboard">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">Panneau d'administration Pokemarket</h3>
                                <p class="text-gray-600">Bienvenue {{ Auth::user()->name }}!</p>
                            </div>

                            <!-- statistique-->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                <div class="bg-blue-50 p-6 rounded-lg">
                                    <h4 class="text-lg font-semibold text-blue-800">Total Pokémon</h4>
                                    <p class="text-3xl font-bold text-blue-600">{{ \App\Models\PokemonModel::count() }}</p>
                                </div>
                                <div class="bg-green-50 p-6 rounded-lg">
                                    <h4 class="text-lg font-semibold text-green-800">Utilisateurs enregistrés</h4>
                                    <p class="text-3xl font-bold text-green-600">{{ \App\Models\User::count() }}</p>
                                </div>
                                <div class="bg-purple-50 p-6 rounded-lg">
                                    <h4 class="text-lg font-semibold text-purple-800">Valeur totale</h4>
                                    <p class="text-3xl font-bold text-purple-600">{{ number_format(\App\Models\PokemonModel::sum('price'), 2) }}€</p>
                                </div>
                            </div>

                            <!-- Actions rapides -->
                            <div class="mb-8">
                                <h4 class="text-lg font-semibold text-gray-800 mb-4">Actions rapides</h4>
                                <div class="flex flex-wrap gap-4">
                                    <a href="{{ route('admin') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                                        Gestion des cartes Pokémon
                                    </a>
                                    <a href="{{ url('/add') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                                        Ajouter une carte Pokémon
                                    </a>
                                    <a href="{{ route('catalogue') }}" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition">
                                        Voir le catalogue public
                                    </a>
                                </div>
                            </div>

                            <!-- View du systeme de gestion -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h4 class="text-lg font-semibold text-gray-800 mb-4">Récemment ajouté</h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    @foreach(\App\Models\PokemonModel::orderBy('id_carte', 'desc')->take(3)->get() as $pokemon)
                                        <div class="bg-white p-4 rounded-lg shadow border">
                                            <div class="flex flex-col items-center">
                                                <img src="{{ asset($pokemon->image) }}" alt="{{ $pokemon->nom_carte }}" class="w-20 h-20 object-cover rounded mb-3">
                                                <h5 class="font-semibold text-center">{{ $pokemon->nom_carte }}</h5>
                                                <p class="text-sm text-gray-600">{{ $pokemon->type_carte }}</p>
                                                <p class="text-lg font-semibold text-green-600">{{ $pokemon->price }}€</p>
                                                <div class="flex gap-2 mt-3">
                                                    <a href="{{ route('pokemons.edit', $pokemon->id_carte) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600">
                                                        Editar
                                                    </a>
                                                    <form action="{{ route('pokemons.delete', $pokemon->id_carte) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600" onclick="return confirm('Excluir {{ $pokemon->nom_carte }}?')">
                                                            Excluir
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Dashboard utilisateur -->
                        <div class="user-dashboard">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">Bienvenue!</h3>
                                <p class="text-gray-600">Bonjour, {{ Auth::user()->name }}! Découvrez notre collection de Pokémon.</p>
                            </div>

                            <!-- Actions utilisateur -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6 rounded-lg text-white">
                                    <h4 class="text-xl font-semibold mb-2">Explorer le catalogue</h4>
                                    <p class="mb-4">Découvrez notre incroyable collection de cartes Pokémon!</p>
                                    <a href="{{ route('catalogue') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                                        Voir le catalogue
                                    </a>
                                </div>
                                <div class="bg-gradient-to-r from-green-500 to-teal-600 p-6 rounded-lg text-white">
                                    <h4 class="text-xl font-semibold mb-2">Mon profile</h4>
                                    <p class="mb-4">Gérez vos informations personnelles</p>
                                    <a href="{{ route('profile.edit') }}" class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                                        Modifier profile
                                    </a>
                                </div>
                            </div>

                            <!-- Pokémon en vedette pour les utilisateurs -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h4 class="text-lg font-semibold text-gray-800 mb-4">Pokémon en vedette</h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    @foreach(\App\Models\PokemonModel::orderBy('id_carte', 'desc')->take(3)->get() as $pokemon)
                                        <div class="bg-white p-4 rounded-lg shadow border">
                                            <div class="flex flex-col items-center">
                                                <img src="{{ asset($pokemon->image) }}" alt="{{ $pokemon->nom_carte }}" class="w-20 h-20 object-cover rounded mb-3">
                                                <h5 class="font-semibold text-center">{{ $pokemon->nom_carte }}</h5>
                                                <p class="text-sm text-gray-600">{{ $pokemon->type_carte }}</p>
                                                <p class="text-lg font-semibold text-green-600">{{ $pokemon->price }}€</p>
                                                <a href="{{ route('product.show', $pokemon->id_carte) }}" class="bg-blue-600 text-white px-4 py-2 rounded mt-3 hover:bg-blue-700 transition">
                                                    Acheter
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>