<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttaqueUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [//tt est mis en nullable car le user modifie ce qu'il veut
            'nom' => 'nullable|string|max:255',
            'attaque_img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dégâts' => 'nullable|integer|min:0',
            'description' => 'nullable|string|max:1000',
            'type_id' => 'nullable|exists:types,id',
        ];
    }
}
