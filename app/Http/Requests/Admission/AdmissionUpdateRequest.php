<?php

namespace App\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionUpdateRequest extends FormRequest
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
        $admissionId = $this->route('id');
        // dd($admissionId);
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admissions,email,' . $admissionId,
            'phone' => 'required|string|max:20',
            'age' => 'required|integer|min:1',
            'nid' => 'required|string|max:50|unique:admissions,nid,' . $admissionId,
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:pending,completed',
            'training_package_id' => 'required|exists:training_packages,id',
            'order_status' => 'required|in:pending,processing,completed,cancelled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }
}
