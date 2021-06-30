<?php

namespace App\Http\Requests;

use App\Models\Work;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWorkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('work_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'gps_lat' => [
                'string',
                'required',
            ],
            'gps_long' => [
                'string',
                'required',
            ],
            'gps_approx' => [
                'required',
            ],
            'payment_type' => [
                'required',
            ],
            'transportation' => [
                'required',
            ],
            'catering' => [
                'required',
            ],
            'country' => [
                'string',
                'required',
            ],
            'county' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'zip' => [
                'string',
                'nullable',
            ],
            'client_id' => [
                'required',
                'integer',
            ],
            'client_ip' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
            'impressions' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'views' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
