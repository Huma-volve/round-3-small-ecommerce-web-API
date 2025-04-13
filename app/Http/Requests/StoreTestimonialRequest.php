<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
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
            'name' => 'required|max:100',
            'comment' => 'required|max:255',
            'image' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field must not exceed 100 characters.',
            'comment.required' => 'The comment field is required.',
            'comment.max' => 'The comment field must not exceed 255 characters.',
            'image.required' => 'The image field is required.',
            'rating.required' => 'The rating field is required.',
            'rating.numeric' => 'The rating field must be a number.',
            'rating.min' => 'The rating field must be at least 1.',
            'rating.max' => 'The rating field must not exceed 5.',
        ];
    }
}
