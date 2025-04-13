<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePolicyRequest extends FormRequest
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
            'title' => 'string|max:255',
            'content' => 'string|max:5000',
            'policy_type' => 'string|max:255',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title field must not exceed 255 characters.',
            'content.required' => 'The content field is required.',
            'content.string' => 'The content field must be a string.',
            'content.max' => 'The content field must not exceed 5000 characters.',
            'policy_type.required' => 'The policy type field is required.',
            'policy_type.string' => 'The policy type field must be a string.',
            'policy_type.max' => 'The policy type field must not exceed 255 characters.',
            'is_active.boolean' => 'The is_active field must be a boolean.',
        ];
    }
}
