@extends('app')
@section('title', 'Add')

@section('content')
<div>
    <h1 class="catalogue-title">Ajouter une carte</h1>
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

<div class="container">
    <form action="{{ route('pokemons.add') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-25">
                <label for="nom_carte" class="product-name">Nom:</label>
            </div>
            <div class="col-75">
                <input type="text" name="nom_carte" value="{{ old('nom_carte') }}" required maxlength="255">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="type_carte" class="product-name">Type:</label>
            </div>
            <div class="col-75">
                <input type="text" name="type_carte" value="{{ old('type_carte') }}" required maxlength="255">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="generation" class="product-name">Generation:</label>
            </div>
            <div class="col-75">
                <select id="generation" name="generation" required>
                    @for($i = 1; $i <= 9; $i++)
                        <option value="{{ $i }}" {{ old('generation') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="price" class="product-name">Prix (€):</label>
            </div>
            <div class="col-75">
                <input type="number" 
                       name="price" 
                       value="{{ old('price') }}" 
                       required 
                       min="0" 
                       max="99999999.99" 
                       step="0.01"
                       placeholder="Ex: 25.50">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="image" class="product-name">Image URL:</label>
            </div>
            <div class="col-75">
                <input type="url" name="image" value="{{ old('image') }}" required placeholder="https://example.com/image.jpg">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="description" class="product-name">Description:</label>
            </div>
            <div class="col-75">
                <textarea name="description" required maxlength="1000">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Créer" class="acheter-btn">
            <a href="{{ route('admin') }}" class="acheter-btn" style="background: #6c757d; margin-left: 10px; text-decoration: none;">Annuler</a>
        </div>
    </form>
</div>

@endsection