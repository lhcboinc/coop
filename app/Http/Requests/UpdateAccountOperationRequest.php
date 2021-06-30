<?php

namespace App\Http\Requests;

use App\Models\AccountOperation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccountOperationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_operation_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'operation' => [
                'required',
            ],
        ];
    }
}
