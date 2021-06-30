<?php

namespace App\Http\Requests;

use App\Models\FavouriteWork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFavouriteWorkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('favourite_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:favourite_works,id',
        ];
    }
}
