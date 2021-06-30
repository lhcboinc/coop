<?php

namespace App\Http\Requests;

use App\Models\UserImage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUserImageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:user_images,id',
        ];
    }
}
