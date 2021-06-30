@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.workingHour.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.working-hours.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.workingHour.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workingHour.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.workingHour.fields.weekday') }}</label>
                <select class="form-control {{ $errors->has('weekday') ? 'is-invalid' : '' }}" name="weekday" id="weekday" required>
                    <option value disabled {{ old('weekday', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\WorkingHour::WEEKDAY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('weekday', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('weekday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weekday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workingHour.fields.weekday_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from">{{ trans('cruds.workingHour.fields.from') }}</label>
                <input class="form-control timepicker {{ $errors->has('from') ? 'is-invalid' : '' }}" type="text" name="from" id="from" value="{{ old('from') }}" required>
                @if($errors->has('from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workingHour.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="till">{{ trans('cruds.workingHour.fields.till') }}</label>
                <input class="form-control timepicker {{ $errors->has('till') ? 'is-invalid' : '' }}" type="text" name="till" id="till" value="{{ old('till') }}" required>
                @if($errors->has('till'))
                    <div class="invalid-feedback">
                        {{ $errors->first('till') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workingHour.fields.till_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection