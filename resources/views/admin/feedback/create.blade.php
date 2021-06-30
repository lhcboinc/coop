@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.feedback.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.feedback.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="work_id">{{ trans('cruds.feedback.fields.work') }}</label>
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
                <span class="help-block">{{ trans('cruds.feedback.fields.work_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.feedback.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_rating">{{ trans('cruds.feedback.fields.client_rating') }}</label>
                <input class="form-control {{ $errors->has('client_rating') ? 'is-invalid' : '' }}" type="number" name="client_rating" id="client_rating" value="{{ old('client_rating', '') }}" step="1">
                @if($errors->has('client_rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.client_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_feedback">{{ trans('cruds.feedback.fields.client_feedback') }}</label>
                <input class="form-control {{ $errors->has('client_feedback') ? 'is-invalid' : '' }}" type="text" name="client_feedback" id="client_feedback" value="{{ old('client_feedback', '') }}">
                @if($errors->has('client_feedback'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_feedback') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.client_feedback_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_wrote_at">{{ trans('cruds.feedback.fields.client_wrote_at') }}</label>
                <input class="form-control datetime {{ $errors->has('client_wrote_at') ? 'is-invalid' : '' }}" type="text" name="client_wrote_at" id="client_wrote_at" value="{{ old('client_wrote_at') }}">
                @if($errors->has('client_wrote_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_wrote_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.client_wrote_at_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('hide_client_feedback') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="hide_client_feedback" value="0">
                    <input class="form-check-input" type="checkbox" name="hide_client_feedback" id="hide_client_feedback" value="1" {{ old('hide_client_feedback', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="hide_client_feedback">{{ trans('cruds.feedback.fields.hide_client_feedback') }}</label>
                </div>
                @if($errors->has('hide_client_feedback'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hide_client_feedback') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.hide_client_feedback_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="worker_id">{{ trans('cruds.feedback.fields.worker') }}</label>
                <select class="form-control select2 {{ $errors->has('worker') ? 'is-invalid' : '' }}" name="worker_id" id="worker_id">
                    @foreach($workers as $id => $entry)
                        <option value="{{ $id }}" {{ old('worker_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('worker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('worker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.worker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="worker_rating">{{ trans('cruds.feedback.fields.worker_rating') }}</label>
                <input class="form-control {{ $errors->has('worker_rating') ? 'is-invalid' : '' }}" type="number" name="worker_rating" id="worker_rating" value="{{ old('worker_rating', '') }}" step="1">
                @if($errors->has('worker_rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('worker_rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.worker_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="worker_feedback">{{ trans('cruds.feedback.fields.worker_feedback') }}</label>
                <input class="form-control {{ $errors->has('worker_feedback') ? 'is-invalid' : '' }}" type="text" name="worker_feedback" id="worker_feedback" value="{{ old('worker_feedback', '') }}">
                @if($errors->has('worker_feedback'))
                    <div class="invalid-feedback">
                        {{ $errors->first('worker_feedback') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.worker_feedback_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="worker_wrote_at">{{ trans('cruds.feedback.fields.worker_wrote_at') }}</label>
                <input class="form-control datetime {{ $errors->has('worker_wrote_at') ? 'is-invalid' : '' }}" type="text" name="worker_wrote_at" id="worker_wrote_at" value="{{ old('worker_wrote_at') }}">
                @if($errors->has('worker_wrote_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('worker_wrote_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.worker_wrote_at_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('hide_worker_feedback') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="hide_worker_feedback" value="0">
                    <input class="form-check-input" type="checkbox" name="hide_worker_feedback" id="hide_worker_feedback" value="1" {{ old('hide_worker_feedback', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="hide_worker_feedback">{{ trans('cruds.feedback.fields.hide_worker_feedback') }}</label>
                </div>
                @if($errors->has('hide_worker_feedback'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hide_worker_feedback') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.hide_worker_feedback_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.feedback.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Feedback::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'active') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feedback.fields.status_helper') }}</span>
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