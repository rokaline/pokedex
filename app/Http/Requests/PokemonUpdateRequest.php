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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [


            'nom' => 'required|unique:pokemon|max:255.'.$this->route('pokemon')->id,
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pv' => 'nullable|integer|min:0',
            'poids' => 'nullable|numeric|min:0',
            'taille' => 'nullable|numeric|min:0',
            'type_obligatoire' => 'required|exists:types,id',
            'type_optionnel' => 'nullable|exists:types,id',

            // //type
            // 'type_nom' => 'required|string|max:255',
            // 'type_img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'couleur' => 'required|string|max:50',

            // //attaque
            // 'attaque_nom' => 'required|string|max:255',
            // 'attaque_img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'dégâts' => 'required|integer|min:0',
            // 'description' => 'required|string|max:1000',
        ];
    }
}
