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
        return [
            'nom' => 'required|string|max:255',
            'attaque_img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dégâts' => 'required|integer|min:0',
            'description' => 'required|string|max:1000',
            'type_id' => 'required|exists:types,id',
        ];
    }
}
