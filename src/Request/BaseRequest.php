<?php

namespace SchoolOnline\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Spatie\DataTransferObject\DataTransferObject;

abstract class BaseRequest extends DataTransferObject
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
    public abstract function rules();

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public abstract function messages();

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => false,
            'code'     => Response::HTTP_UNPROCESSABLE_ENTITY,
            'messages' => $validator->errors()
        ]));
    }
}
