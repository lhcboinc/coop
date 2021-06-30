<?php

namespace App\Http\Requests;

use App\Models\UserImage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserImageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_image_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'url' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
