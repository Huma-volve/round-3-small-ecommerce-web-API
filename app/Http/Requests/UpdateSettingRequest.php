<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'key' => 'string|max:255',
            'value' => 'max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'key.string' => 'Key must be a string.',
            'key.max' => 'Key must not exceed 255 characters.',
            'value.max' => 'Value must not exceed 255 characters.',
        ];
    }
}
