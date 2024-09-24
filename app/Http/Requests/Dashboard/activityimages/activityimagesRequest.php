<?php

namespace App\Http\Requests\Dashboard\activityimages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class activityimagesRequest extends FormRequest
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
            'path' => 'required|string',
            'activity_id' => 'required|exists:activities,id',

        ];
    }
}
