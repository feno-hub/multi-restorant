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
}
