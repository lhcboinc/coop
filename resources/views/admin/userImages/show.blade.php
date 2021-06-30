@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userImage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-images.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userImage.fields.id') }}
                        </th>
                        <td>
                            {{ $userImage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userImage.fields.user') }}
                        </th>
                        <td>
                            {{ $userImage->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userImage.fields.url') }}
                        </th>
                        <td>
                            {{ $userImage->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userImage.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\UserImage::STATUS_SELECT[$userImage->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userImage.fields.reported') }}
                        </th>
                        <td>
                            {{ App\Models\UserImage::REPORTED_SELECT[$userImage->reported] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-images.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection