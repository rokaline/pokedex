<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonUpdateRequest extends FormRequest
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
            'nom' => 'required|string|max:255|unique:pokemons,nom,' . $this->route('pokemon')->id,
            'pv' => 'required|integer|min:0',
            'poids' => 'required|numeric|min:0',
            'taille' => 'required|numeric|min:0',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'types' => 'required|array|min:1',
            'types.*' => 'exists:types,id',
            'couleur' => 'required|string|max:50',
            'attaque' => 'required|string|max:255',
            'dégâts' => 'required|integer|min:0',
            'description' => 'required|string|max:1000',
        ];
    }
}
