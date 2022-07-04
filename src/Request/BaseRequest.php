<?php

namespace SchoolOnline\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class BaseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }

    protected function failedValidation(Validator $validator)
    {
        $errorMessage = "";
        foreach($validator->errors()->toArray() as $key => $message) {
            $errorMessage .= implode("<br/>", $message) . "<br/>";
        }
        throw new HttpResponseException(response()->json([
            'status' => 0,
            'msg' => $errorMessage
        ]));
    }
}
