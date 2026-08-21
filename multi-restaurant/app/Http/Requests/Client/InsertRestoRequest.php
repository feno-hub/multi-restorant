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
                'max:10',
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
            "instat" => [
                'required',
                'unique:restos,instat',
                'mimes: jpg,png,jpeg,pdf',
            ],
            "website" => [
                'unique:restos,website',
            ],
        ];
    }
}
