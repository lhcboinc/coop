@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.workImage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.work-images.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="work_id">{{ trans('cruds.workImage.fields.work') }}</label>
                <select class="form-control select2 {{ $errors->has('work') ? 'is-invalid' : '' }}" name="work_id" id="work_id" required>
                    @foreach($works as $id => $entry)
                        <option value="{{ $id }}" {{ old('work_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workImage.fields.work_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="url">{{ trans('cruds.workImage.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}" required>
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workImage.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position">{{ trans('cruds.workImage.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number" name="position" id="position" value="{{ old('position', '') }}" step="1">
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workImage.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.workImage.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\WorkImage::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'under review') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workImage.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.workImage.fields.reported') }}</label>
                <select class="form-control {{ $errors->has('reported') ? 'is-invalid' : '' }}" name="reported" id="reported">
                    <option value disabled {{ old('reported', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\WorkImage::REPORTED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('reported', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('reported'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reported') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workImage.fields.reported_helper') }}</span>
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