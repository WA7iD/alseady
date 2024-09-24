<?php

namespace App\Http\Requests\Dashboard\Offer;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            //'category_id' =>'required|exists:categories,id' ,
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'price' => 'required|integer',
            'price_after_discount' => 'nullable|integer',
            'image' =>  $this->isMethod('post') ? 'required' : 'nullable' . '|mimes:jpeg,png,jpg,gif,svg,webp',
        ];
    }
}
