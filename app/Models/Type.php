<?php
/*app/Models/Types.php*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Type extends Model
{
    // Utilisation de la factory associée
    use HasFactory;

    // Définir les attributs pouvant être remplis
    protected $fillable = ['image', 'nom', 'couleur'];

    /**
     * Définir la relation entre Type et Attaques.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attaques()
    {
        return $this->hasMany(Attaque::class);

        /* un type peut avoir plusieurs attaques, mais une attaque à un seul type*/
    }

    /**
     * Définir la relation entre Type et Pokémon.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pokemon()
    {
        return $this->belongsToMany(Pokemon::class);
        /*Un type peut avoir plusieurs Pokémon, et un Pokémon peut avoir plusieurs types*/
    }
}
