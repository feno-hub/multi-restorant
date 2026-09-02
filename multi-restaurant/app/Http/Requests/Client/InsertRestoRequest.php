<?php

namespace App\Http\Requests\Client;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class InsertRestoRequest extends FormRequest
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
                'min:3',
                'max:20',
            ],

            "category" => [
                'required',
                'max:20',
                'min:3'
            ],
            "phone" => [
                'required',
                'min:10',
                'max:10'
            ],
            "email" => [
                "required",
                "email",
                "unique:restos,email"
            ],
            "address" => [
                'required',
                'max:50',
                'min:3',
            ],
            "city" => [
                'required',
                'max:20',
                'min:3'
            ],
            "description" => [
                'required',
                'min:3',
                'max:255'
            ],
            "open_time" => [
                'required'
            ],
            "close_time" => [
                'required'
            ],
            "logo" => [
                'mimes: jpg,png,jpeg,',
                'image'
            ],
            "cover" => [
                'required',
                'mimes: jpg,png,jpeg,',
                'image'
            ],
            "nifstat" => [
                'required',
                'image',
                'mimes: jpg,png,jpeg,pdf',
            ],
            "website" => [
                'unique:restos,website',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du restaurant est obligatoire.',
            'name.min' => 'Le nom du restaurant doit contenir au moins 3 caractères.',
            'name.max' => 'Le nom du restaurant ne doit pas dépasser 20 caractères.',

            'category.required' => 'La catégorie du restaurant est obligatoire.',
            'category.min' => 'La catégorie doit contenir au moins 3 caractères.',
            'category.max' => 'La catégorie ne doit pas dépasser 20 caractères.',

            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.min' => 'Le numéro de téléphone doit contenir 10 chiffres.',
            'phone.max' => 'Le numéro de téléphone doit contenir 10 chiffres.',

            'email.required' => 'L’adresse email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',

            'address.required' => 'L’adresse du restaurant est obligatoire.',
            'address.min' => 'L’adresse doit contenir au moins 3 caractères.',
            'address.max' => 'L’adresse ne doit pas dépasser 50 caractères.',

            'city.required' => 'La ville est obligatoire.',
            'city.min' => 'La ville doit contenir au moins 3 caractères.',
            'city.max' => 'La ville ne doit pas dépasser 20 caractères.',

            'description.required' => 'La description du restaurant est obligatoire.',
            'description.min' => 'La description doit contenir au moins 3 caractères.',
            'description.max' => 'La description ne doit pas dépasser 255 caractères.',

            'open_time.required' => 'L’heure d’ouverture est obligatoire.',

            'close_time.required' => 'L’heure de fermeture est obligatoire.',

            'logo.image' => 'Le logo doit être une image.',
            'logo.mimes' => 'Le logo doit être au format JPG, JPEG ou PNG.',

            'cover.required' => 'L’image de couverture est obligatoire.',
            'cover.image' => 'L’image de couverture doit être une image.',
            'cover.mimes' => 'L’image de couverture doit être au format JPG, JPEG ou PNG.',

            'nifstat.required' => 'Le document NIF/STAT est obligatoire.',
            'nifstat.image' => 'Le NIF/STAT doit être une image.',
            'nifstat.mimes' => 'Le NIF/STAT doit être au format JPG, JPEG, PNG ou PDF.',

            'website.unique' => 'Cette adresse de site web est déjà utilisée.',
        ];
    }
}
