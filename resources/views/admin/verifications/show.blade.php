@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.verification.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.verifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.verification.fields.id') }}
                        </th>
                        <td>
                            {{ $verification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verification.fields.user') }}
                        </th>
                        <td>
                            {{ $verification->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verification.fields.doc') }}
                        </th>
                        <td>
                            @if($verification->doc)
                                <a href="{{ $verification->doc->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $verification->doc->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verification.fields.doc_country') }}
                        </th>
                        <td>
                            {{ $verification->doc_country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verification.fields.firstname') }}
                        </th>
                        <td>
                            {{ $verification->firstname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verification.fields.lastname') }}
                        </th>
                        <td>
                            {{ $verification->lastname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verification.fields.lastdigits') }}
                        </th>
                        <td>
                            {{ $verification->lastdigits }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verification.fields.verified_by') }}
                        </th>
                        <td>
                            {{ $verification->verified_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.verification.fields.editor') }}
                        </th>
                        <td>
                            {{ $verification->editor->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.verifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection