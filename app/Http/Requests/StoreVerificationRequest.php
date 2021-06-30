<?php

namespace App\Http\Requests;

use App\Models\Verification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVerificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('verification_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'doc' => [
                'required',
            ],
            'doc_country' => [
                'string',
                'nullable',
            ],
            'firstname' => [
                'string',
                'nullable',
            ],
            'lastname' => [
                'string',
                'nullable',
            ],
            'lastdigits' => [
                'string',
                'nullable',
            ],
        ];
    }
}
