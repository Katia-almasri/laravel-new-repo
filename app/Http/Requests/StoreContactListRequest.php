<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactListRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first-name' => ['required', 'unique:contact_list,first_name'],
            'phone-number' => [
                'regex:/^(\+|00)[0-9]+$/',
                'unique:contact_list,phone_number',
                function ($attribute, $value, $fail) {
                    // Remove + or 00 for length validation
                    $numericValue = preg_replace('/^(\+|00)/', '', $value);

                    // Check if the remaining part has between 10 and 15 digits
                    if (strlen($numericValue) < 10 || strlen($numericValue) > 15) {
                        $fail('The ' . $attribute . ' must be between 10 and 15 digits (excluding the prefix).');
                    }
                }
            ]
        ];
    }
}
