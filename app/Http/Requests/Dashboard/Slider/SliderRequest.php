<?php

namespace App\Http\Requests\Dashboard\Slider;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_ar' => 'nullable|string',
            'title_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => $this->isMethod('post') ? 'required' : 'nullable' . '|mimes:jpeg,png,jpg,gif,svg,webp' // Adjust validation rules as needed.
        ];
    }
}
