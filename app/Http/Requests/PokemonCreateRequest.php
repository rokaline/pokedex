<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|unique:pokemons|max:255', // Champ obligatoire, unique dans la table 'pokemons', max 255 caractères
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Champ obligatoire, fichier image (jpeg, png, jpg, gif), taille maximale de 2048 Ko (2 Mo)
            'pv' => 'required|integer|min:0', // Champ obligatoire, entier, valeur minimale de 0
            'poids' => 'required|numeric|min:0', // Champ obligatoire, numérique, valeur minimale de 0
            'taille' => 'required|numeric|min:0', // Champ obligatoire, numérique, valeur minimale de 0

            'types' => 'required|array|min:1', // Au moins un type doit être sélectionné
            'types.*' => 'exists:types,id', // Chaque type sélectionné doit exister dans la table 'types' avec un ID valide
            'couleur' => 'required|string|max:50', // Couleur du Pokémon, champ obligatoire, chaîne de caractères, max 50 caractères

            'attaque' => 'required|string|max:255', // Type d'attaque, champ obligatoire, chaîne de caractères, max 255 caractères
            'dégâts' => 'required|integer|min:0', // Dégâts de l'attaque, champ obligatoire, entier, valeur minimale de 0
            'description' => 'required|string|max:1000', // Description de l'attaque, champ obligatoire, chaîne de caractères, max 1000 caractères
            //

        ];
    }
}
