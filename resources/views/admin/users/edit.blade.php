@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.user.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text">{{ trans('cruds.user.fields.text') }}</label>
                <input class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" type="text" name="text" id="text" value="{{ old('text', $user->text) }}">
                @if($errors->has('text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="signal">{{ trans('cruds.user.fields.signal') }}</label>
                <input class="form-control {{ $errors->has('signal') ? 'is-invalid' : '' }}" type="text" name="signal" id="signal" value="{{ old('signal', $user->signal) }}">
                @if($errors->has('signal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('signal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.signal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skype">{{ trans('cruds.user.fields.skype') }}</label>
                <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text" name="skype" id="skype" value="{{ old('skype', $user->skype) }}">
                @if($errors->has('skype'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skype') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.skype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telegram">{{ trans('cruds.user.fields.telegram') }}</label>
                <input class="form-control {{ $errors->has('telegram') ? 'is-invalid' : '' }}" type="text" name="telegram" id="telegram" value="{{ old('telegram', $user->telegram) }}">
                @if($errors->has('telegram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telegram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.telegram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="viber">{{ trans('cruds.user.fields.viber') }}</label>
                <input class="form-control {{ $errors->has('viber') ? 'is-invalid' : '' }}" type="text" name="viber" id="viber" value="{{ old('viber', $user->viber) }}">
                @if($errors->has('viber'))
                    <div class="invalid-feedback">
                        {{ $errors->first('viber') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.viber_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="whatsapp">{{ trans('cruds.user.fields.whatsapp') }}</label>
                <input class="form-control {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}" type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}">
                @if($errors->has('whatsapp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whatsapp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.whatsapp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.user.fields.photo') }}</label>
                <input class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" type="text" name="photo" id="photo" value="{{ old('photo', $user->photo) }}">
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ready_to_go">{{ trans('cruds.user.fields.ready_to_go') }}</label>
                <input class="form-control datetime {{ $errors->has('ready_to_go') ? 'is-invalid' : '' }}" type="text" name="ready_to_go" id="ready_to_go" value="{{ old('ready_to_go', $user->ready_to_go) }}">
                @if($errors->has('ready_to_go'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ready_to_go') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.ready_to_go_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latest_activity">{{ trans('cruds.user.fields.latest_activity') }}</label>
                <input class="form-control datetime {{ $errors->has('latest_activity') ? 'is-invalid' : '' }}" type="text" name="latest_activity" id="latest_activity" value="{{ old('latest_activity', $user->latest_activity) }}">
                @if($errors->has('latest_activity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latest_activity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.latest_activity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rating_as_worker">{{ trans('cruds.user.fields.rating_as_worker') }}</label>
                <input class="form-control {{ $errors->has('rating_as_worker') ? 'is-invalid' : '' }}" type="number" name="rating_as_worker" id="rating_as_worker" value="{{ old('rating_as_worker', $user->rating_as_worker) }}" step="0.01">
                @if($errors->has('rating_as_worker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rating_as_worker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.rating_as_worker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rating_as_client">{{ trans('cruds.user.fields.rating_as_client') }}</label>
                <input class="form-control {{ $errors->has('rating_as_client') ? 'is-invalid' : '' }}" type="number" name="rating_as_client" id="rating_as_client" value="{{ old('rating_as_client', $user->rating_as_client) }}" step="0.01">
                @if($errors->has('rating_as_client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rating_as_client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.rating_as_client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gps_lat">{{ trans('cruds.user.fields.gps_lat') }}</label>
                <input class="form-control {{ $errors->has('gps_lat') ? 'is-invalid' : '' }}" type="text" name="gps_lat" id="gps_lat" value="{{ old('gps_lat', $user->gps_lat) }}">
                @if($errors->has('gps_lat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_lat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.gps_lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gps_long">{{ trans('cruds.user.fields.gps_long') }}</label>
                <input class="form-control {{ $errors->has('gps_long') ? 'is-invalid' : '' }}" type="text" name="gps_long" id="gps_long" value="{{ old('gps_long', $user->gps_long) }}">
                @if($errors->has('gps_long'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_long') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.gps_long_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.gps_approx') }}</label>
                <select class="form-control {{ $errors->has('gps_approx') ? 'is-invalid' : '' }}" name="gps_approx" id="gps_approx">
                    <option value disabled {{ old('gps_approx', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::GPS_APPROX_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gps_approx', $user->gps_approx) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gps_approx'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_approx') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.gps_approx_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.user.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', $user->country) }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="county">{{ trans('cruds.user.fields.county') }}</label>
                <input class="form-control {{ $errors->has('county') ? 'is-invalid' : '' }}" type="text" name="county" id="county" value="{{ old('county', $user->county) }}">
                @if($errors->has('county'))
                    <div class="invalid-feedback">
                        {{ $errors->first('county') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.county_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.user.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $user->city) }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $user->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.user.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', $user->zip) }}">
                @if($errors->has('zip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.user.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $user->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="impressions">{{ trans('cruds.user.fields.impressions') }}</label>
                <input class="form-control {{ $errors->has('impressions') ? 'is-invalid' : '' }}" type="number" name="impressions" id="impressions" value="{{ old('impressions', $user->impressions) }}" step="1">
                @if($errors->has('impressions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('impressions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.impressions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="views">{{ trans('cruds.user.fields.views') }}</label>
                <input class="form-control {{ $errors->has('views') ? 'is-invalid' : '' }}" type="number" name="views" id="views" value="{{ old('views', $user->views) }}" step="1">
                @if($errors->has('views'))
                    <div class="invalid-feedback">
                        {{ $errors->first('views') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.views_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.user.fields.note') }}</label>
                <input class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" type="text" name="note" id="note" value="{{ old('note', $user->note) }}">
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('notify_email') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="notify_email" value="0">
                    <input class="form-check-input" type="checkbox" name="notify_email" id="notify_email" value="1" {{ $user->notify_email || old('notify_email', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="notify_email">{{ trans('cruds.user.fields.notify_email') }}</label>
                </div>
                @if($errors->has('notify_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.notify_email_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('notify_push') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="notify_push" value="0">
                    <input class="form-check-input" type="checkbox" name="notify_push" id="notify_push" value="1" {{ $user->notify_push || old('notify_push', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="notify_push">{{ trans('cruds.user.fields.notify_push') }}</label>
                </div>
                @if($errors->has('notify_push'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_push') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.notify_push_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('notify_sms') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="notify_sms" value="0">
                    <input class="form-check-input" type="checkbox" name="notify_sms" id="notify_sms" value="1" {{ $user->notify_sms || old('notify_sms', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="notify_sms">{{ trans('cruds.user.fields.notify_sms') }}</label>
                </div>
                @if($errors->has('notify_sms'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_sms') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.notify_sms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="confirmed_at">{{ trans('cruds.user.fields.confirmed_at') }}</label>
                <input class="form-control datetime {{ $errors->has('confirmed_at') ? 'is-invalid' : '' }}" type="text" name="confirmed_at" id="confirmed_at" value="{{ old('confirmed_at', $user->confirmed_at) }}">
                @if($errors->has('confirmed_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('confirmed_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.confirmed_at_helper') }}</span>
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