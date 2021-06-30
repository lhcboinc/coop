@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.message.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.messages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="offer_id">{{ trans('cruds.message.fields.offer') }}</label>
                <select class="form-control select2 {{ $errors->has('offer') ? 'is-invalid' : '' }}" name="offer_id" id="offer_id" required>
                    @foreach($offers as $id => $entry)
                        <option value="{{ $id }}" {{ old('offer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('offer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('offer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.message.fields.offer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sender_id">{{ trans('cruds.message.fields.sender') }}</label>
                <select class="form-control select2 {{ $errors->has('sender') ? 'is-invalid' : '' }}" name="sender_id" id="sender_id" required>
                    @foreach($senders as $id => $entry)
                        <option value="{{ $id }}" {{ old('sender_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.message.fields.sender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="recipient_id">{{ trans('cruds.message.fields.recipient') }}</label>
                <select class="form-control select2 {{ $errors->has('recipient') ? 'is-invalid' : '' }}" name="recipient_id" id="recipient_id" required>
                    @foreach($recipients as $id => $entry)
                        <option value="{{ $id }}" {{ old('recipient_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('recipient'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recipient') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.message.fields.recipient_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text">{{ trans('cruds.message.fields.text') }}</label>
                <textarea class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" name="text" id="text" required>{{ old('text') }}</textarea>
                @if($errors->has('text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.message.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sent_at">{{ trans('cruds.message.fields.sent_at') }}</label>
                <input class="form-control datetime {{ $errors->has('sent_at') ? 'is-invalid' : '' }}" type="text" name="sent_at" id="sent_at" value="{{ old('sent_at') }}" required>
                @if($errors->has('sent_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sent_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.message.fields.sent_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="read_at">{{ trans('cruds.message.fields.read_at') }}</label>
                <input class="form-control datetime {{ $errors->has('read_at') ? 'is-invalid' : '' }}" type="text" name="read_at" id="read_at" value="{{ old('read_at') }}">
                @if($errors->has('read_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('read_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.message.fields.read_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.message.fields.endorsed') }}</label>
                <select class="form-control {{ $errors->has('endorsed') ? 'is-invalid' : '' }}" name="endorsed" id="endorsed">
                    <option value disabled {{ old('endorsed', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Message::ENDORSED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('endorsed', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('endorsed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('endorsed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.message.fields.endorsed_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.message.fields.reported') }}</label>
                <select class="form-control {{ $errors->has('reported') ? 'is-invalid' : '' }}" name="reported" id="reported">
                    <option value disabled {{ old('reported', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Message::REPORTED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('reported', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('reported'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reported') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.message.fields.reported_helper') }}</span>
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