<?php
// PokemonUpdateRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonUpdateRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Récupère les règles de validation qui s'appliquent à la requête.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255|unique:pokemon,nom,' . $this->route('pokemon')->id,

            'pv' => 'nullable|integer',
            'poids' => 'nullable|numeric',
            'taille' => 'nullable|numeric',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'type_obligatoire' => 'required|exists:types,id',
            'attaque_obligatoire' => 'required|integer',

            'type_optionnel' => 'nullable|exists:types,id',
            'attaque_optionnelle' => 'nullable|exists:attaques,id',


        ];
    }


    /**
     * Messages personnalisés pour les erreurs de validation.
     *
     * @return array<string, string>
     */

}
