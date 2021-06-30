<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOfferRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('offer_create');
    }

    public function rules()
    {
        return [
            'work_id' => [
                'required',
                'integer',
            ],
            'worker_id' => [
                'required',
                'integer',
            ],
            'worker_ip' => [
                'string',
                'required',
            ],
        ];
    }
}
