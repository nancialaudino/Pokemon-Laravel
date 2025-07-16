<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PokemonModel extends Model
{
    protected $table = 'pokemons';
    protected $primaryKey = 'id_carte';
    public $timestamps = false;

    public $fillable = [
        'nom_carte',
        'type_carte',
        'generation',
        'price',
        'image',
        'description',
    ];

}
