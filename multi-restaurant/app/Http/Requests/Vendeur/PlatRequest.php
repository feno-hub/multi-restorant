<?php

namespace App\Http\Requests\Vendeur;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class PlatRequest extends FormRequest
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
            'menu_id' => ['required', 'exists:menus,id'],
            'name' => ['required', 'string', 'max:255'],
            'qty' => 'required|integer|min:0',
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:Disponible,Indisponible'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            "name.required" => "Cette champs est obligatoire.",
            "name.max" => "Le nombre de caractère doit être inferieur de 50.",
            "name.min" => "Le nombre de caractère doit être superieur de 2.",

            'qty.required' => 'La quantité est obligatoire.',
            'qty.integer' => 'La quantité doit être un nombre entier.',
            'qty.min' => 'La quantité ne peut pas être négative.',

            "price.required" => "Cette champs est obligatoire.",
            "price.min" => "Le prix doit être positif.",

            "qty.required" => "Cette champs est obligatoire.",
            "qty.min" => "La quantité doit être superieur à 0",
            "qty.max" => "La quantité doit être inferieur à 20",

            "image.required" => "Cette champs est obligatoire.",
            "image.mimes" => "Seulle les extensios autorisées: jpeg, jpg, webp, png .",

            "description.required" => "Cette champs est obligatoire.",
            "description.max" => "Le nombre de caractère doit être inferieur de 255.",
            "description.min" => "Le nombre de caractère doit être superieur de 10.",
        ];
    }
}
