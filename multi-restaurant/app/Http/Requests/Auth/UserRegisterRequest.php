<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class UserRegisterRequest extends FormRequest
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
            "name" => "required|max:30|min:2",
            "last_name" => "required|max:25|min:2",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6|max:6|confirmed"
        ];
    }

    #[Override]
    public function messages() : array {
        return [
            "name.required" => "nom est obligatoire",
            "name.max" => "Le caractère doit être inferieur à 30 caractères",
            "name.min" => "Le caractère doit être supperieur à 2 caractères",
            "lastname.required" => "prenom est obligatoire",
            "lastname.max" => "Le caractère doit être inferieur à 25 caractères",
            "lastname.min" => "Le caractère doit être supperieur à 2 caractères",
            "email.required" => "email est obligatoire",
            "email.email" => "email invalide",
            "email.unique" => "email éxiste déjà",
            "password.required" => "le mot de passe est obligatoire",
            "password.min" => "le mot de passe doit être 6 caractères",
            "password.max" => "le mot de passe doit être 6 caractères",
            "password.confirmed" => "le mot de passe ne correspond pas",
        ];
    }

}
