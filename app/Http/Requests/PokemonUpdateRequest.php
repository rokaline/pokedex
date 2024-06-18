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

            //pokemon
            'nom' => 'required|unique:pokemon|max:255.'.$this->route('pokemon')->id,
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pv' => 'required|integer|min:0',
            'poids' => 'required|numeric|min:0',
            'taille' => 'required|numeric|min:0',

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
