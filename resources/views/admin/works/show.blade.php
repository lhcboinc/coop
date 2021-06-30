@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.work.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.id') }}
                        </th>
                        <td>
                            {{ $work->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.title') }}
                        </th>
                        <td>
                            {{ $work->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.description') }}
                        </th>
                        <td>
                            {{ $work->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.gps_lat') }}
                        </th>
                        <td>
                            {{ $work->gps_lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.gps_long') }}
                        </th>
                        <td>
                            {{ $work->gps_long }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.gps_approx') }}
                        </th>
                        <td>
                            {{ App\Models\Work::GPS_APPROX_SELECT[$work->gps_approx] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Models\Work::PAYMENT_TYPE_SELECT[$work->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.payment_rate') }}
                        </th>
                        <td>
                            {{ $work->payment_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.transportation') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $work->transportation ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.catering') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $work->catering ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.country') }}
                        </th>
                        <td>
                            {{ $work->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.county') }}
                        </th>
                        <td>
                            {{ $work->county }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.city') }}
                        </th>
                        <td>
                            {{ $work->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.address') }}
                        </th>
                        <td>
                            {{ $work->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.zip') }}
                        </th>
                        <td>
                            {{ $work->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.client') }}
                        </th>
                        <td>
                            {{ $work->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.client_ip') }}
                        </th>
                        <td>
                            {{ $work->client_ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Work::STATUS_SELECT[$work->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.impressions') }}
                        </th>
                        <td>
                            {{ $work->impressions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.views') }}
                        </th>
                        <td>
                            {{ $work->views }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.endorsed') }}
                        </th>
                        <td>
                            {{ App\Models\Work::ENDORSED_SELECT[$work->endorsed] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.work.fields.reported') }}
                        </th>
                        <td>
                            {{ App\Models\Work::REPORTED_SELECT[$work->reported] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#work_offers" role="tab" data-toggle="tab">
                {{ trans('cruds.offer.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#work_work_images" role="tab" data-toggle="tab">
                {{ trans('cruds.workImage.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#work_feedback" role="tab" data-toggle="tab">
                {{ trans('cruds.feedback.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#work_favourite_works" role="tab" data-toggle="tab">
                {{ trans('cruds.favouriteWork.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="work_offers">
            @includeIf('admin.works.relationships.workOffers', ['offers' => $work->workOffers])
        </div>
        <div class="tab-pane" role="tabpanel" id="work_work_images">
            @includeIf('admin.works.relationships.workWorkImages', ['workImages' => $work->workWorkImages])
        </div>
        <div class="tab-pane" role="tabpanel" id="work_feedback">
            @includeIf('admin.works.relationships.workFeedback', ['feedback' => $work->workFeedback])
        </div>
        <div class="tab-pane" role="tabpanel" id="work_favourite_works">
            @includeIf('admin.works.relationships.workFavouriteWorks', ['favouriteWorks' => $work->workFavouriteWorks])
        </div>
    </div>
</div>

@endsection