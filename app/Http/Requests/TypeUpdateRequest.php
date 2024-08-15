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

            'nom' => 'nullable|string|max:255|unique:types,nom,' . $this->route('type')->id,
            'type_img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'couleur' => 'nullable|string|max:50',
        ];
    }
}
