<?php

namespace App\Http\Controllers;

use App\Models\PokemonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Exibe o painel administrativo principal (lista de pokémons) - novo sistema
     */
    public function index()
    {
        $pokemons = PokemonModel::all();
        return view('admin.pokemons.index', compact('pokemons'));
    }

    /**
     * Método antigo para compatibilidade - redireciona para o novo
     */
    public function index2()
    {
        $pokemons = PokemonModel::all();
        return view('admin', compact('pokemons'));
    }

    /**
     * Exibe o formulário para criar novo pokémon
     */
    public function create()
    {
        return view('add'); // Sua view existente
    }

    /**
     * Armazena um novo pokémon
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_carte' => 'required|string|max:255',
            'type_carte' => 'required|string|max:255',
            'generation' => 'required|integer|min:1|max:9',
            'price' => 'required|numeric|min:0',
            'image' => 'required|url',
            'description' => 'required|string',
        ]);

        $pokemon = PokemonModel::create([
            'nom_carte' => $request->nom_carte,
            'type_carte' => $request->type_carte,
            'generation' => $request->generation,
            'price' => $request->price,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.pokemons.index')
                        ->with('success', 'Pokémon "' . $pokemon->nom_carte . '" foi adicionado com sucesso!');
    }

    /**
     * Método antigo para adicionar - para compatibilidade
     */
    public function add(Request $request)
    {
        $request->validate([
            'nom_carte' => 'required|string|max:255',
            'type_carte' => 'required|string|max:255',
            'generation' => 'required|integer|min:1|max:9',
            'price' => 'required|numeric|min:0|max:99999999.99',
            'image' => 'required|string',
            'description' => 'required|string',
        ]);

        $pokemon = PokemonModel::create([
            'nom_carte' => $request->input('nom_carte'),
            'type_carte' => $request->input('type_carte'),
            'generation' => $request->input('generation'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin')->with('success', 'Pokémon ajouté avec succès!');
    }

    /**
     * Exibe o formulário para editar pokémon
     */
    public function edit($id)
    {
        $pokemon = PokemonModel::findOrFail($id);
        return view('edit', compact('pokemon')); // Sua view existente
    }

    /**
     * Atualiza um pokémon existente
     */
    public function update(Request $request, $id)
    {
        $pokemon = PokemonModel::findOrFail($id);

        $request->validate([
            'nom_carte' => 'required|string|max:255',
            'type_carte' => 'required|string|max:255',
            'generation' => 'required|integer|min:1|max:9',
            'price' => 'required|numeric|min:0|max:99999999.99',
            'image' => 'required|string',
            'description' => 'required|string',
        ]);

        $pokemon->update([
            'nom_carte' => $request->nom_carte,
            'type_carte' => $request->type_carte,
            'generation' => $request->generation,
            'price' => $request->price,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return redirect()->route('admin')->with('success', 'Pokémon modifié avec succès!');
    }

    /**
     * Remove um pokémon (novo método)
     */
    public function destroy($id)
    {
        $pokemon = PokemonModel::findOrFail($id);
        $nome = $pokemon->nom_carte;
        
        $pokemon->delete();

        return redirect()->route('admin.pokemons.index')
                        ->with('success', 'Pokémon "' . $nome . '" foi removido com sucesso!');
    }

    /**
     * Remove um pokémon (método antigo para compatibilidade)
     */
    public function delete($id)
    {
        $pokemon = PokemonModel::findOrFail($id);
        $nome = $pokemon->nom_carte;

        $pokemon->delete();

        return redirect()->back()->with('success', 'Pokémon "' . $nome . '" supprimé!');
    }
}