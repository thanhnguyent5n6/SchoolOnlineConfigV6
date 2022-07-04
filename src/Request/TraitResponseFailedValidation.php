<?php

namespace SchoolOnline\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

Trait TraitResponseFailedValidation
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => false,
            'code'     => Response::HTTP_UNPROCESSABLE_ENTITY,
            'messages' => $validator->errors()
        ]));
    }
}
