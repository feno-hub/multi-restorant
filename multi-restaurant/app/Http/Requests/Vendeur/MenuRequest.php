<?php

namespace App\Http\Requests\Vendeur;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class MenuRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => [
                'required',
                'max:50',
                'min:2'
            ],
            "stat" => [
                'required'
            ],
            "image" => [
                'required',
                'image',
                'mimes:jpg,jpeg,webp,png'
            ], 
            "description" => [
                'required',
                'max:255',
                'min:10'
            ]
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            "name.required" => "Cette champs est obligatoire.",
            "name.max" => "Le nombre de caractère doit être inferieur de 50.",
            "name.min" => "Le nombre de caractère doit être superieur de 2.",

            "stat.required" => "Cette champs est obligatoire.",

            "image.required" => "Cette champs est obligatoire.",
            "image.mimes" => "Seulle les extensios autorisées: jpeg, jpg, webp, png .",

            "description.required" => "Cette champs est obligatoire.",
            "description.max" => "Le nombre de caractère doit être inferieur de 255.",
            "description.min" => "Le nombre de caractère doit être superieur de 10.",
        ];
    }

}
