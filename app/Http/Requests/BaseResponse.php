<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseResponse extends FormRequest
{
    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(
          response()->json([
            'responseCode' => 101,
            'responseMessage' => 'input validation',
            'responseDescription' => 'The given data was invalid.',
            'errors' => $validator->errors()
          ], 422)
        ); 
    }
    
}