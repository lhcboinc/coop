<?php

namespace App\Http\Requests;

use App\Models\FavouriteUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFavouriteUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('favourite_user_edit');
    }

    public function rules()
    {
        return [
            'author_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
