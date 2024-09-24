<?php

namespace App\Http\Requests\Api\Web\Order;

use App\Traits\Responser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class OrderRequest extends FormRequest
{
    use Responser ;
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
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.amount' => 'required|integer',
            'phone' => 'required',
            'another_phone' => 'required',
            'name' => 'required|string',
            'address' => 'required|string',
        ];
    }
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException( $this->returnValidationError(400, $validator));
    }
}
