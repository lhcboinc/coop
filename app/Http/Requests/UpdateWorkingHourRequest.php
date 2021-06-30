<?php

namespace App\Http\Requests;

use App\Models\WorkingHour;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWorkingHourRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('working_hour_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'weekday' => [
                'required',
            ],
            'from' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'till' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
        ];
    }
}
