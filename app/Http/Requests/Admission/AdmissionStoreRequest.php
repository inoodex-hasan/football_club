<?php

namespace App\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionStoreRequest extends FormRequest
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

            'training_package_id' => 'required|exists:training_packages,id',
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'nid' => 'required|string|max:20',
            'age' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:pending,completed',
            'order_status' => 'required|in:pending,processing,completed',
        ];
    }
}
