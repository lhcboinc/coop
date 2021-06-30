@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.verification.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.verifications.update", [$verification->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.verification.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $verification->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.verification.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="doc">{{ trans('cruds.verification.fields.doc') }}</label>
                <div class="needsclick dropzone {{ $errors->has('doc') ? 'is-invalid' : '' }}" id="doc-dropzone">
                </div>
                @if($errors->has('doc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('doc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.verification.fields.doc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="doc_country">{{ trans('cruds.verification.fields.doc_country') }}</label>
                <input class="form-control {{ $errors->has('doc_country') ? 'is-invalid' : '' }}" type="text" name="doc_country" id="doc_country" value="{{ old('doc_country', $verification->doc_country) }}">
                @if($errors->has('doc_country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('doc_country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.verification.fields.doc_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="firstname">{{ trans('cruds.verification.fields.firstname') }}</label>
                <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" type="text" name="firstname" id="firstname" value="{{ old('firstname', $verification->firstname) }}">
                @if($errors->has('firstname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('firstname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.verification.fields.firstname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lastname">{{ trans('cruds.verification.fields.lastname') }}</label>
                <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" type="text" name="lastname" id="lastname" value="{{ old('lastname', $verification->lastname) }}">
                @if($errors->has('lastname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lastname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.verification.fields.lastname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lastdigits">{{ trans('cruds.verification.fields.lastdigits') }}</label>
                <input class="form-control {{ $errors->has('lastdigits') ? 'is-invalid' : '' }}" type="text" name="lastdigits" id="lastdigits" value="{{ old('lastdigits', $verification->lastdigits) }}">
                @if($errors->has('lastdigits'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lastdigits') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.verification.fields.lastdigits_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verified_by_id">{{ trans('cruds.verification.fields.verified_by') }}</label>
                <select class="form-control select2 {{ $errors->has('verified_by') ? 'is-invalid' : '' }}" name="verified_by_id" id="verified_by_id">
                    @foreach($verified_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('verified_by_id') ? old('verified_by_id') : $verification->verified_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('verified_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('verified_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.verification.fields.verified_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="editor_id">{{ trans('cruds.verification.fields.editor') }}</label>
                <select class="form-control select2 {{ $errors->has('editor') ? 'is-invalid' : '' }}" name="editor_id" id="editor_id">
                    @foreach($editors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('editor_id') ? old('editor_id') : $verification->editor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('editor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('editor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.verification.fields.editor_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.docDropzone = {
    url: '{{ route('admin.verifications.storeMedia') }}',
    maxFilesize: 6, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 6,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="doc"]').remove()
      $('form').append('<input type="hidden" name="doc" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="doc"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($verification) && $verification->doc)
      var file = {!! json_encode($verification->doc) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="doc" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection