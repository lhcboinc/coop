<?php

namespace App\Http\Requests;

use App\Models\FavouriteUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFavouriteUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('favourite_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:favourite_users,id',
        ];
    }
}
