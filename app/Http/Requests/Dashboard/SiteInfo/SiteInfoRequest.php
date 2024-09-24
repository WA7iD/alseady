<?php

namespace App\Http\Requests\Dashboard\SiteInfo;

use Illuminate\Foundation\Http\FormRequest;

class SiteInfoRequest extends FormRequest
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
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'logo' => $this->isMethod('post') ? 'required' : 'nullable' . '|mimes:jpeg,png,jpg,gif,svg,webp',
            'logo_footer' => $this->isMethod('post') ? 'required' : 'nullable' . '|mimes:jpeg,png,jpg,gif,svg,webp',
            'fav_icon' => $this->isMethod('post') ? 'required' : 'nullable' . '|mimes:jpeg,png,jpg,gif,svg,webp',
            'email' => 'required|email',
            'phone' => 'required|string',
            'whatsapp_phone' => 'required|string',
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'instagram' => 'required|string',
        ];
    }
}
