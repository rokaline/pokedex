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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {

        return [
            'nom' => 'required|unique:pokemon|max:255',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pv' => 'required|integer|min:0',
            'poids' => 'required|numeric|min:0',
            'taille' => 'required|numeric|min:0',
        ];
    }

}
