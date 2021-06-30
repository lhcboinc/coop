<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTutorialRequest;
use App\Http\Requests\UpdateTutorialRequest;
use App\Http\Resources\Admin\TutorialResource;
use App\Models\Tutorial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TutorialsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tutorial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TutorialResource(Tutorial::with(['author', 'editor'])->get());
    }

    public function store(StoreTutorialRequest $request)
    {
        $tutorial = Tutorial::create($request->all());

        if ($request->input('image', false)) {
            $tutorial->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new TutorialResource($tutorial))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tutorial $tutorial)
    {
        abort_if(Gate::denies('tutorial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TutorialResource($tutorial->load(['author', 'editor']));
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

        return (new TutorialResource($tutorial))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tutorial $tutorial)
    {
        abort_if(Gate::denies('tutorial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutorial->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
