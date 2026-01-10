<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'status' => 'required|boolean',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,bmp|max:5048',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,bmp|max:5048',
            'old_images.*' => 'nullable|string',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Oops! Event title is required. Please provide a catchy title.',
            'title.string' => 'The title must be text only.',
            'title.max' => 'Title is too long! Maximum 255 characters allowed.',
            'details.required' => 'Please add some details about the event.',
            'status.required' => 'You must choose the status for the event.',
            'status.boolean' => 'Status value is invalid.',
            'main_image.image' => 'Main image must be a valid image file.',
            'main_image.mimes' => 'Main image format not allowed. Use jpg, png, gif, webp, or bmp.',
            'main_image.max' => 'Main image is too large. Max 5MB allowed.',
            'images.*.image' => 'Each gallery image must be a valid image file.',
            'images.*.mimes' => 'Gallery images must be jpg, png, gif, webp, or bmp.',
            'images.*.max' => 'Each gallery image must be less than 5MB.',
        ];
    }
}
