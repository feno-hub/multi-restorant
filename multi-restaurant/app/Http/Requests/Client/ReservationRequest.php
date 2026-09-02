<?php

namespace App\Http\Requests\Client;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
                'max: 30',
                'min: 3'
            ],
            "email" => [
                'required',
                "unique: email, reservations",
                'email',
                'max: 50'
            ],
            "phone" => [
                'required',
                'max: 9',
                'min: 9'
            ],
            "message" => [
                'max: 50',
                'min: 3',
            ],
            "date" => [
                'required'
            ],
            "time" => [
                'required'
            ],
            "guests" => [
                'required',
                'min: 1'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'name.min' => 'Le nom doit contenir au moins 3 caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 30 caractères.',

            'email.required' => 'L’adresse email est obligatoire.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'email.max' => 'L’adresse email ne doit pas dépasser 50 caractères.',

            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.min' => 'Le numéro de téléphone doit contenir 9 chiffres.',
            'phone.max' => 'Le numéro de téléphone doit contenir 9 chiffres.',

            'message.min' => 'Le message doit contenir au moins 3 caractères.',
            'message.max' => 'Le message ne doit pas dépasser 50 caractères.',

            'date.required' => 'La date de réservation est obligatoire.',

            'time.required' => 'L’heure de réservation est obligatoire.',

            'guests.required' => 'Le nombre de personnes est obligatoire.',
            'guests.min' => 'Le nombre de personnes doit être au minimum de 1.',
        ];
    }
}
