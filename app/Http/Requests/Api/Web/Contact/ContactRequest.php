<?php

namespace App\Http\Requests\Api\Web\Contact;

use App\Traits\Responser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class ContactRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email'=>'nullable|email',
            'phone'=>'required|string|min:10|max:15',
            'message'=>'required|string',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException( $this->returnValidationError(400, $validator));
    }
}
