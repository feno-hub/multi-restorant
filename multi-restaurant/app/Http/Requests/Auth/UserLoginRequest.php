<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class UserLoginRequest extends FormRequest
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
            'email' => "required|email",
            'password' => "required"
        ];

    }

    #[Override]
    public function messages()
    {
        return [
            "email.required" => "Veuiller remplir ce champs",
            "email.email" => "Email n' existe pas",
            "email.regex" => "Email invalide",
            "password.required" => "Veuiller saisissez votre mot de passe"
        ];
    }

}
