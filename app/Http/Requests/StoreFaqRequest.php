<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
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
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:5000',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'question.required' => 'The question field is required.',
            'answer.required' => 'The answer field is required.',
            'is_active.boolean' => 'The is_active field must be a boolean.',
        ];
    }
}
