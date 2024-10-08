<?php
// Models/Attaque.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Attaque extends Model
{
    // Utilisation de la factory associée
    use HasFactory;

    // Définir les attributs pouvant être rempli
    protected $fillable = ['nom', 'img_path', 'dégâts', 'description', 'type_id'];

    /**
     * Définir la relation entre Attaque et Type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
        /*une attaque a un seul type*/
    }

    /**
     * Définir la relation entre Attaque et Pokémon.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function pokemon()
    // {
    //     return $this->belongsToMany(Pokemon::class);
    //     /*une attaque peut-e utilisée par Pokémo et un Pokémon peut prendre plusieurs attaques*/
    // }

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class, 'attaque_pokemon');
         /*une attaque peut-e utilisée par Pokémo et un Pokémon peut prendre plusieurs attaques*/
    }
}
