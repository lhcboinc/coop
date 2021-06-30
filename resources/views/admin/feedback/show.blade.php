@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.feedback.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.feedback.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.id') }}
                        </th>
                        <td>
                            {{ $feedback->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.work') }}
                        </th>
                        <td>
                            {{ $feedback->work->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.client') }}
                        </th>
                        <td>
                            {{ $feedback->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.client_rating') }}
                        </th>
                        <td>
                            {{ $feedback->client_rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.client_feedback') }}
                        </th>
                        <td>
                            {{ $feedback->client_feedback }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.client_wrote_at') }}
                        </th>
                        <td>
                            {{ $feedback->client_wrote_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.hide_client_feedback') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $feedback->hide_client_feedback ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.worker') }}
                        </th>
                        <td>
                            {{ $feedback->worker->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.worker_rating') }}
                        </th>
                        <td>
                            {{ $feedback->worker_rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.worker_feedback') }}
                        </th>
                        <td>
                            {{ $feedback->worker_feedback }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.worker_wrote_at') }}
                        </th>
                        <td>
                            {{ $feedback->worker_wrote_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.hide_worker_feedback') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $feedback->hide_worker_feedback ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Feedback::STATUS_SELECT[$feedback->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.feedback.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection