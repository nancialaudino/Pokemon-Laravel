@extends('app')
@section('title', 'Modifier Pokémon')

@section('content')
    <main class="main">
        <div class="container">
            <div>
            <h1 class="catalogue-title">Modifier Pokémon</h1>
            </div>

            <form action="{{ route('pokemons.update', $pokemon->id_carte) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-25">
                        <label>Nom de la carte</label>

                    </div>
                    <div class="col-75">
                        <input type="text" name="nom_carte" value="{{ old('nom_carte', $pokemon->nom_carte) }}" required>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-25">

                        <label>Type:</label>

                    </div>
                    <div class="col-75">
                        <input type="text" name="type_carte" value="{{ old('type_carte', $pokemon->type_carte) }}" required>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-25">
                        <label>Generation:</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="generation" value="{{ old('generation', $pokemon->generation) }}" required>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-25">
                        <label>Prix:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="price" value="{{ old('price', $pokemon->price) }}" required>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-25">
                        <label>Image:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="image" value="{{ old('image', $pokemon->image) }}" required>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-25">
                        <label>Description:</label>
                    </div>
                    <div class="col-75">
                        <textarea name="description" required>{{ old('description', $pokemon->description) }}</textarea>
                    </div>
                 </div>
                 <div class="row">
                        <button type="submit" class="acheter-btn">Enregistrer</button>
                </div>
            </form>
        </div>
    </main>
@endsection
