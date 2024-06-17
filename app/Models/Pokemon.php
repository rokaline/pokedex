<?php
/*app/Models/Pokemon.php*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pokemon extends Model
{
    // Utilisation de la factory associée
    use HasFactory;
    protected $table = 'pokemon';
    // Définir les attributs pouvant être remplis
    protected $fillable = ['nom','img_path','pv', 'poids', 'taille'];

    /**
     * Définir la relation entre Pokémon et Types.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany(Type::class, 'pokemon_type');
        /*belongsTomany car un pokemon peut avoir pls types et un type peut-etre pris par plus pokemon*/
    }

    /**
     * Définir la relation entre Pokémon et Attaques.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attaques()
    {
        return $this->belongsToMany(Attaque::class,'attaque_pokemon');
        /* un pokemon peut avoir pls attaques et une attaque peut-etre utilisée par un ou pls pokemon*/
    }
}
