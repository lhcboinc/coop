@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.work.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.works.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.work.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.work.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gps_lat">{{ trans('cruds.work.fields.gps_lat') }}</label>
                <input class="form-control {{ $errors->has('gps_lat') ? 'is-invalid' : '' }}" type="text" name="gps_lat" id="gps_lat" value="{{ old('gps_lat', '') }}" required>
                @if($errors->has('gps_lat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_lat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.gps_lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gps_long">{{ trans('cruds.work.fields.gps_long') }}</label>
                <input class="form-control {{ $errors->has('gps_long') ? 'is-invalid' : '' }}" type="text" name="gps_long" id="gps_long" value="{{ old('gps_long', '') }}" required>
                @if($errors->has('gps_long'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_long') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.gps_long_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.work.fields.gps_approx') }}</label>
                <select class="form-control {{ $errors->has('gps_approx') ? 'is-invalid' : '' }}" name="gps_approx" id="gps_approx" required>
                    <option value disabled {{ old('gps_approx', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Work::GPS_APPROX_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gps_approx', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gps_approx'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_approx') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.gps_approx_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.work.fields.payment_type') }}</label>
                <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type" required>
                    <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Work::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_rate">{{ trans('cruds.work.fields.payment_rate') }}</label>
                <input class="form-control {{ $errors->has('payment_rate') ? 'is-invalid' : '' }}" type="number" name="payment_rate" id="payment_rate" value="{{ old('payment_rate', '') }}" step="0.01">
                @if($errors->has('payment_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.payment_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('transportation') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="transportation" id="transportation" value="1" required {{ old('transportation', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="transportation">{{ trans('cruds.work.fields.transportation') }}</label>
                </div>
                @if($errors->has('transportation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transportation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.transportation_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('catering') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="catering" id="catering" value="1" required {{ old('catering', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="catering">{{ trans('cruds.work.fields.catering') }}</label>
                </div>
                @if($errors->has('catering'))
                    <div class="invalid-feedback">
                        {{ $errors->first('catering') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.catering_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country">{{ trans('cruds.work.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}" required>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="county">{{ trans('cruds.work.fields.county') }}</label>
                <input class="form-control {{ $errors->has('county') ? 'is-invalid' : '' }}" type="text" name="county" id="county" value="{{ old('county', '') }}" required>
                @if($errors->has('county'))
                    <div class="invalid-feedback">
                        {{ $errors->first('county') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.county_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.work.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.work.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.work.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', '') }}">
                @if($errors->has('zip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.work.fields.client') }}</label>
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
                <span class="help-block">{{ trans('cruds.work.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_ip">{{ trans('cruds.work.fields.client_ip') }}</label>
                <input class="form-control {{ $errors->has('client_ip') ? 'is-invalid' : '' }}" type="text" name="client_ip" id="client_ip" value="{{ old('client_ip', '') }}" required>
                @if($errors->has('client_ip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_ip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.client_ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.work.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Work::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'hidden') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="impressions">{{ trans('cruds.work.fields.impressions') }}</label>
                <input class="form-control {{ $errors->has('impressions') ? 'is-invalid' : '' }}" type="number" name="impressions" id="impressions" value="{{ old('impressions', '') }}" step="1">
                @if($errors->has('impressions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('impressions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.impressions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="views">{{ trans('cruds.work.fields.views') }}</label>
                <input class="form-control {{ $errors->has('views') ? 'is-invalid' : '' }}" type="number" name="views" id="views" value="{{ old('views', '') }}" step="1">
                @if($errors->has('views'))
                    <div class="invalid-feedback">
                        {{ $errors->first('views') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.views_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.work.fields.endorsed') }}</label>
                <select class="form-control {{ $errors->has('endorsed') ? 'is-invalid' : '' }}" name="endorsed" id="endorsed">
                    <option value disabled {{ old('endorsed', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Work::ENDORSED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('endorsed', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('endorsed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('endorsed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.endorsed_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.work.fields.reported') }}</label>
                <select class="form-control {{ $errors->has('reported') ? 'is-invalid' : '' }}" name="reported" id="reported">
                    <option value disabled {{ old('reported', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Work::REPORTED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('reported', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('reported'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reported') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.work.fields.reported_helper') }}</span>
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