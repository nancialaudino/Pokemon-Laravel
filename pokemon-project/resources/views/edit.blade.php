@extends('app')
@section('title', 'Modifier Pokémon')

@section('content')
    <main class="main">
        <div class="container">
            <div>
                <h1 class="catalogue-title">Modifier Pokémon</h1>
            </div>

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pokemons.update', $pokemon->id_carte) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-25">
                        <label>Nom de la carte</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nom_carte" value="{{ old('nom_carte', $pokemon->nom_carte) }}" required maxlength="255">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Type:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="type_carte" value="{{ old('type_carte', $pokemon->type_carte) }}" required maxlength="255">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Generation:</label>
                    </div>
                    <div class="col-75">
                        <select name="generation" required>
                            @for($i = 1; $i <= 9; $i++)
                                <option value="{{ $i }}" {{ old('generation', $pokemon->generation) == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Prix (€):</label>
                    </div>
                    <div class="col-75">
                        <input type="number" 
                               name="price" 
                               value="{{ old('price', $pokemon->price) }}" 
                               required 
                               min="0" 
                               max="99999999.99" 
                               step="0.01"
                               placeholder="Ex: 25.50">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Image URL:</label>
                    </div>
                    <div class="col-75">
                        <input type="url" name="image" value="{{ old('image', $pokemon->image) }}" required placeholder="image/example.tipoDeFicheiro">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Description:</label>
                    </div>
                    <div class="col-75">
                        <textarea name="description" required maxlength="1000">{{ old('description', $pokemon->description) }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="acheter-btn">Enregistrer</button>
                    <a href="{{ route('admin') }}" class="acheter-btn" style="background: #6c757d; margin-left: 10px; text-decoration: none;">Annuler</a>
                </div>
            </form>
        </div>
    </main>
@endsection