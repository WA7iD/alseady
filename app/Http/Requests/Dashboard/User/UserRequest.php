<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(Request $request): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => ($this->isMethod('POST') ? 'required|' : 'nullable|') . 'min:8|confirmed',
            'image' => $request->method() == 'POST' ? 'required|mimes:jpeg,png,jpg,gif,svg' : 'nullable|mimes:jpeg,png,jpg,gif,svg',
            
        ];
    }
}
