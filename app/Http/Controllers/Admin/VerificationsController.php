<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVerificationRequest;
use App\Http\Requests\StoreVerificationRequest;
use App\Http\Requests\UpdateVerificationRequest;
use App\Models\User;
use App\Models\Verification;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VerificationsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('verification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verifications = Verification::with(['user', 'verified_by', 'editor', 'media'])->get();

        $users = User::get();

        return view('admin.verifications.index', compact('verifications', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('verification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $editors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.verifications.create', compact('users', 'verified_bies', 'editors'));
    }

    public function store(StoreVerificationRequest $request)
    {
        $verification = Verification::create($request->all());

        if ($request->input('doc', false)) {
            $verification->addMedia(storage_path('tmp/uploads/' . basename($request->input('doc'))))->toMediaCollection('doc');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $verification->id]);
        }

        return redirect()->route('admin.verifications.index');
    }

    public function edit(Verification $verification)
    {
        abort_if(Gate::denies('verification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $editors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification->load('user', 'verified_by', 'editor');

        return view('admin.verifications.edit', compact('users', 'verified_bies', 'editors', 'verification'));
    }

    public function update(UpdateVerificationRequest $request, Verification $verification)
    {
        $verification->update($request->all());

        if ($request->input('doc', false)) {
            if (!$verification->doc || $request->input('doc') !== $verification->doc->file_name) {
                if ($verification->doc) {
                    $verification->doc->delete();
                }
                $verification->addMedia(storage_path('tmp/uploads/' . basename($request->input('doc'))))->toMediaCollection('doc');
            }
        } elseif ($verification->doc) {
            $verification->doc->delete();
        }

        return redirect()->route('admin.verifications.index');
    }

    public function show(Verification $verification)
    {
        abort_if(Gate::denies('verification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verification->load('user', 'verified_by', 'editor');

        return view('admin.verifications.show', compact('verification'));
    }

    public function destroy(Verification $verification)
    {
        abort_if(Gate::denies('verification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verification->delete();

        return back();
    }

    public function massDestroy(MassDestroyVerificationRequest $request)
    {
        Verification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('verification_create') && Gate::denies('verification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Verification();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
