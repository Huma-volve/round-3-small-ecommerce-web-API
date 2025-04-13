<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqRequest extends FormRequest
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
            'question' => 'string|max:255',
            'answer' => 'string|max:5000',
            'is_active' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'question.string' => 'The question must be a string.',
            'question.max' => 'The question must not exceed 255 characters.',
            'answer.string' => 'The answer must be a string.',
            'answer.max' => 'The answer must not exceed 5000 characters.',
            'is_active.boolean' => 'The is_active field must be a boolean.',
        ];
    }
}
