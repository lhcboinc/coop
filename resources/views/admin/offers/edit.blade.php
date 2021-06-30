@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.offer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offers.update", [$offer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="work_id">{{ trans('cruds.offer.fields.work') }}</label>
                <select class="form-control select2 {{ $errors->has('work') ? 'is-invalid' : '' }}" name="work_id" id="work_id" required>
                    @foreach($works as $id => $entry)
                        <option value="{{ $id }}" {{ (old('work_id') ? old('work_id') : $offer->work->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.work_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="worker_id">{{ trans('cruds.offer.fields.worker') }}</label>
                <select class="form-control select2 {{ $errors->has('worker') ? 'is-invalid' : '' }}" name="worker_id" id="worker_id" required>
                    @foreach($workers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('worker_id') ? old('worker_id') : $offer->worker->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('worker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('worker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.worker_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="worker_ip">{{ trans('cruds.offer.fields.worker_ip') }}</label>
                <input class="form-control {{ $errors->has('worker_ip') ? 'is-invalid' : '' }}" type="text" name="worker_ip" id="worker_ip" value="{{ old('worker_ip', $offer->worker_ip) }}" required>
                @if($errors->has('worker_ip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('worker_ip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.worker_ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.offer.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Offer::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $offer->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.status_helper') }}</span>
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