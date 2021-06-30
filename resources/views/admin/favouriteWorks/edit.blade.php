@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.favouriteWork.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.favourite-works.update", [$favouriteWork->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="author_id">{{ trans('cruds.favouriteWork.fields.author') }}</label>
                <select class="form-control select2 {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author_id" id="author_id" required>
                    @foreach($authors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('author_id') ? old('author_id') : $favouriteWork->author->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('author') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.favouriteWork.fields.author_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="work_id">{{ trans('cruds.favouriteWork.fields.work') }}</label>
                <select class="form-control select2 {{ $errors->has('work') ? 'is-invalid' : '' }}" name="work_id" id="work_id" required>
                    @foreach($works as $id => $entry)
                        <option value="{{ $id }}" {{ (old('work_id') ? old('work_id') : $favouriteWork->work->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.favouriteWork.fields.work_helper') }}</span>
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