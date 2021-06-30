@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.workingHour.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.working-hours.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.workingHour.fields.id') }}
                        </th>
                        <td>
                            {{ $workingHour->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workingHour.fields.user') }}
                        </th>
                        <td>
                            {{ $workingHour->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workingHour.fields.weekday') }}
                        </th>
                        <td>
                            {{ App\Models\WorkingHour::WEEKDAY_SELECT[$workingHour->weekday] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workingHour.fields.from') }}
                        </th>
                        <td>
                            {{ $workingHour->from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workingHour.fields.till') }}
                        </th>
                        <td>
                            {{ $workingHour->till }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.working-hours.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection