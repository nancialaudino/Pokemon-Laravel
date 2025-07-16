<?php

namespace App\Http\Controllers;

use App\Models\PokemonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
{
    public function index()
    {
        //$pokemons = DB::select('SELECT nom_carte FROM Pokemon');
        $pokemons = PokemonModel::all();
        return view('catalogue', compact('pokemons'));
    }

        public function show($id)
    {
        $pokemon = PokemonModel::findOrFail($id);
        return view('product', compact('pokemon'));
    }

}

