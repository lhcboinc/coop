<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTutorialRequest;
use App\Http\Requests\StoreTutorialRequest;
use App\Http\Requests\UpdateTutorialRequest;
use App\Models\Tutorial;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TutorialsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tutorial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutorials = Tutorial::with(['author', 'editor', 'media'])->get();

        $users = User::get();

        return view('admin.tutorials.index', compact('tutorials', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('tutorial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $editors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tutorials.create', compact('authors', 'editors'));
    }

    public function store(StoreTutorialRequest $request)
    {
        $tutorial = Tutorial::create($request->all());

        if ($request->input('image', false)) {
            $tutorial->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tutorial->id]);
        }

        return redirect()->route('admin.tutorials.index');
    }

    public function edit(Tutorial $tutorial)
    {
        abort_if(Gate::denies('tutorial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $editors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tutorial->load('author', 'editor');

        return view('admin.tutorials.edit', compact('authors', 'editors', 'tutorial'));
    }

    public function update(UpdateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->update($request->all());

        if ($request->input('image', false)) {
            if (!$tutorial->image || $request->input('image') !== $tutorial->image->file_name) {
                if ($tutorial->image) {
                    $tutorial->image->delete();
                }
                $tutorial->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($tutorial->image) {
            $tutorial->image->delete();
        }

        return redirect()->route('admin.tutorials.index');
    }

    public function show(Tutorial $tutorial)
    {
        abort_if(Gate::denies('tutorial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutorial->load('author', 'editor');

        return view('admin.tutorials.show', compact('tutorial'));
    }

    public function destroy(Tutorial $tutorial)
    {
        abort_if(Gate::denies('tutorial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutorial->delete();

        return back();
    }

    public function massDestroy(MassDestroyTutorialRequest $request)
    {
        Tutorial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tutorial_create') && Gate::denies('tutorial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Tutorial();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
