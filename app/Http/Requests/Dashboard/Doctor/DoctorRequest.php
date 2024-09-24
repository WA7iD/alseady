<?php

namespace App\Http\Requests\Dashboard\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name' =>  'required|string',
            'description' =>  'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => $this->isMethod('post') ? 'required' : 'nullable' . '|mimes:jpeg,png,jpg,gif,svg,webp'

        ];
    }
}
