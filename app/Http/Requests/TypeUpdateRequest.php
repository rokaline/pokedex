<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; //tjs true
    }

    public function rules(): array
    {
        return [
            //type
            'nom' => 'required|string|max:255',
            'type_img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'couleur' => 'required|string|max:50',
        ];
    }
}
