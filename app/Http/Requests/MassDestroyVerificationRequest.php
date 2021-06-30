<?php

namespace App\Http\Requests;

use App\Models\Verification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVerificationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('verification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:verifications,id',
        ];
    }
}
