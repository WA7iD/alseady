<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Phone;

class AdminRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:users,email' . ($this->isMethod('PUT') ? ',' . $this->admin : ''),
            'phone' => ['required', new Phone,'unique:users,phone' . ($this->isMethod('PUT') ? ',' . $this->admin : '')],
            'password' => ($this->isMethod('POST') ? 'required|' : 'nullable|') . 'min:8|confirmed',
            'image' => 'nullable|exclude|image|mimes:jpg,jpeg,png',
   
            'is_active' => 'nullable',
        ];
    }
}
