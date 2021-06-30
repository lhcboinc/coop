<?php

namespace App\Http\Requests;

use App\Models\WorkImage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWorkImageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('work_image_create');
    }

    public function rules()
    {
        return [
            'work_id' => [
                'required',
                'integer',
            ],
            'url' => [
                'string',
                'required',
            ],
            'position' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
