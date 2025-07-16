<?php

namespace App\Http\Controllers;

use App\Models\PokemonModel;
use Illuminate\Http\Request;

class AdminController extends Controller

{
    public function create()
    {
        return view('add');
    }

      public function add(Request $request)
    {
        
  
        $pokemon = PokemonModel::create([
        'nom_carte' => $request->input('nom_carte'),
        'type_carte' => $request->input('type_carte'),
        'generation' => $request->input('generation'),
        'price' => $request->input('price'),
        'image' => $request->input('image'),
        'description' => $request->input('description'),
         ]);

        return response()->json(['message' => 'Pokémon successfully added!', 'pokemon' => $pokemon]);
    }

        public function index()
    {
        return view('admin');
    }



        public function mod()
    {
        return view('modifier');
    }



        public function delete($id)
        {
            $pokemon = PokemonModel::find($id);

            if (!$pokemon) {
                return redirect()->back()->with('error', 'Not found');
            }

            $pokemon->delete();

            return redirect()->back()->with('success', 'Pokémon supprimé!');
        }



        public function index2()
    {
        //$pokemons = DB::select('SELECT nom_carte FROM Pokemon');
        $pokemons = PokemonModel::all();
        return view('admin', compact('pokemons'));
    }



        public function edit($id)
    {
        $pokemon = PokemonModel::findOrFail($id);
        return view('edit', compact('pokemon'));
    }


        public function update(Request $request, $id)
        {
            $pokemon = PokemonModel::findOrFail($id);

            $request->validate([
                'nom_carte' => 'required',
                'type_carte' => 'required',
                'generation' => 'required|integer',
                'price' => 'required|numeric',
                'image' => 'required',
                'description' => 'required',
            ]);

            $pokemon->update([
                'nom_carte' => $request->nom_carte,
                'type_carte' => $request->type_carte,
                'generation' => $request->generation,
                'price' => $request->price,
                'image' => $request->image,
                'description' => $request->description,
            ]);

            return redirect()->route('admin')->with('success', 'Pokémon atualizado com sucesso!');
    }



}





