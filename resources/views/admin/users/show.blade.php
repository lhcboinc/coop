@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.first_name') }}
                        </th>
                        <td>
                            {{ $user->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.last_name') }}
                        </th>
                        <td>
                            {{ $user->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.text') }}
                        </th>
                        <td>
                            {{ $user->text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.signal') }}
                        </th>
                        <td>
                            {{ $user->signal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.skype') }}
                        </th>
                        <td>
                            {{ $user->skype }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.telegram') }}
                        </th>
                        <td>
                            {{ $user->telegram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.viber') }}
                        </th>
                        <td>
                            {{ $user->viber }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.whatsapp') }}
                        </th>
                        <td>
                            {{ $user->whatsapp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.photo') }}
                        </th>
                        <td>
                            {{ $user->photo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.ready_to_go') }}
                        </th>
                        <td>
                            {{ $user->ready_to_go }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.latest_activity') }}
                        </th>
                        <td>
                            {{ $user->latest_activity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.rating_as_worker') }}
                        </th>
                        <td>
                            {{ $user->rating_as_worker }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.rating_as_client') }}
                        </th>
                        <td>
                            {{ $user->rating_as_client }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.gps_lat') }}
                        </th>
                        <td>
                            {{ $user->gps_lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.gps_long') }}
                        </th>
                        <td>
                            {{ $user->gps_long }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.gps_approx') }}
                        </th>
                        <td>
                            {{ App\Models\User::GPS_APPROX_SELECT[$user->gps_approx] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.country') }}
                        </th>
                        <td>
                            {{ $user->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.county') }}
                        </th>
                        <td>
                            {{ $user->county }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.city') }}
                        </th>
                        <td>
                            {{ $user->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.address') }}
                        </th>
                        <td>
                            {{ $user->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.zip') }}
                        </th>
                        <td>
                            {{ $user->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\User::STATUS_SELECT[$user->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.impressions') }}
                        </th>
                        <td>
                            {{ $user->impressions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.views') }}
                        </th>
                        <td>
                            {{ $user->views }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.note') }}
                        </th>
                        <td>
                            {{ $user->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.notify_email') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->notify_email ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.notify_push') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->notify_push ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.notify_sms') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->notify_sms ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.confirmed_at') }}
                        </th>
                        <td>
                            {{ $user->confirmed_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#client_works" role="tab" data-toggle="tab">
                {{ trans('cruds.work.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#worker_offers" role="tab" data-toggle="tab">
                {{ trans('cruds.offer.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_images" role="tab" data-toggle="tab">
                {{ trans('cruds.userImage.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#client_feedback" role="tab" data-toggle="tab">
                {{ trans('cruds.feedback.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#worker_feedback" role="tab" data-toggle="tab">
                {{ trans('cruds.feedback.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_account_operations" role="tab" data-toggle="tab">
                {{ trans('cruds.accountOperation.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_favourite_users" role="tab" data-toggle="tab">
                {{ trans('cruds.favouriteUser.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_verifications" role="tab" data-toggle="tab">
                {{ trans('cruds.verification.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="client_works">
            @includeIf('admin.users.relationships.clientWorks', ['works' => $user->clientWorks])
        </div>
        <div class="tab-pane" role="tabpanel" id="worker_offers">
            @includeIf('admin.users.relationships.workerOffers', ['offers' => $user->workerOffers])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_images">
            @includeIf('admin.users.relationships.userUserImages', ['userImages' => $user->userUserImages])
        </div>
        <div class="tab-pane" role="tabpanel" id="client_feedback">
            @includeIf('admin.users.relationships.clientFeedback', ['feedback' => $user->clientFeedback])
        </div>
        <div class="tab-pane" role="tabpanel" id="worker_feedback">
            @includeIf('admin.users.relationships.workerFeedback', ['feedback' => $user->workerFeedback])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_account_operations">
            @includeIf('admin.users.relationships.userAccountOperations', ['accountOperations' => $user->userAccountOperations])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_favourite_users">
            @includeIf('admin.users.relationships.userFavouriteUsers', ['favouriteUsers' => $user->userFavouriteUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_verifications">
            @includeIf('admin.users.relationships.userVerifications', ['verifications' => $user->userVerifications])
        </div>
    </div>
</div>

@endsection