<?php

namespace App\Http\Requests\Dashboard\Activity;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ActivityRequest extends FormRequest
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
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'images' => $this->isMethod('post') ? 'required' : 'nullable' . '|array',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg,webp' ,

        ];
    }
}
