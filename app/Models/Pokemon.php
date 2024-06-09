<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pokemon extends Model
{
    // Utilisation de la factory associée
    use HasFactory;

    // Définir les attributs pouvant être remplis
    protected $fillable = ['nom','pv', 'poids', 'taille'];

    /**
     * Définir la relation entre Pokémon et Types.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany(Types::class);
        /*belongsTomany car un pokemon peut avoir pls types et un type peut-etre pris par plus pokemon*/
    }

    /**
     * Définir la relation entre Pokémon et Attaques.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attaques()
    {
        return $this->belongsToMany(Attaques::class);
        /* un pokemon peut avoir pls attaques et une attaque peut-etre utilisée par un ou pls pokemon*/
    }
}
