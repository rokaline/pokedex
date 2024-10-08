<?php
/** pour permettre les modifications */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttaqueCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // tjs mettre en true

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

     public function rules():array
     {
         return [
             'nom' => 'required|string|max:255',
             'attaque_img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'dégâts' => 'required|integer|min:0',
             'description' => 'required|string|max:1000',
             'type_id' => 'required|exists:types,id', 

         ];
     }


}
