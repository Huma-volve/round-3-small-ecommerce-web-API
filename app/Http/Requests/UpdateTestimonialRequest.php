<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
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
            'name' => 'string|max:100',
            'comment' => 'string|max:255',
            'image' => 'string|max:255',
            'rating' => 'numeric|min:1|max:5',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field must not exceed 100 characters.',
            'comment.string' => 'The comment field must be a string.',
            'comment.max' => 'The comment field must not exceed 255 characters.',
            'image.string' => 'The image field must be a url.',
            'image.max' => 'The image field must not exceed 255 characters.',
            'rating.numeric' => 'The rating field must be a number.',
            'rating.min' => 'The rating field must be at least 1.',
            'rating.max' => 'The rating field must not exceed 5.',
        ];
    }
}
