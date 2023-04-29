<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'isbn' => 'required|numeric',
            'value' => 'required|regex:/^[0-9]*\.[0-9][0-9]$/', // money format with 2 decimal places
        ];
    }

    public function messages(): array
    {
        return [
            'value.regex' => 'The value attribute must contain only numbers and 2 decimal places. E.g 54.99',
        ];
    }
}
