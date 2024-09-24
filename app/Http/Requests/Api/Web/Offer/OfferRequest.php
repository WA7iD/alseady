<?php

namespace App\Http\Requests\Api\Web\Offer;

use App\Traits\Responser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class OfferRequest extends FormRequest
{
    use Responser;
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
            'title' =>'nullable|string',
            'price_from' =>'nullable|integer|required_with:price_to',
            'price_to' =>'nullable|integer|required_with:price_from',
        ];
    }
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException( $this->returnValidationError(400, $validator));
    }
}
