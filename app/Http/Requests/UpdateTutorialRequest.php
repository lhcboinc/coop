<?php

namespace App\Http\Requests;

use App\Models\Tutorial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTutorialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tutorial_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:tutorials,title,' . request()->route('tutorial')->id,
            ],
            'description' => [
                'required',
            ],
            'category' => [
                'required',
            ],
            'url' => [
                'string',
                'nullable',
            ],
            'order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'required',
            ],
            'author_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
