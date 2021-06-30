<?php

namespace App\Http\Requests;

use App\Models\FavouriteWork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFavouriteWorkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('favourite_work_create');
    }

    public function rules()
    {
        return [
            'author_id' => [
                'required',
                'integer',
            ],
            'work_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
