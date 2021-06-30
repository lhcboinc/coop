<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkImageRequest;
use App\Http\Requests\UpdateWorkImageRequest;
use App\Http\Resources\Admin\WorkImageResource;
use App\Models\WorkImage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkImagesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('work_image_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WorkImageResource(WorkImage::with(['work'])->get());
    }

    public function store(StoreWorkImageRequest $request)
    {
        $workImage = WorkImage::create($request->all());

        return (new WorkImageResource($workImage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(WorkImage $workImage)
    {
        abort_if(Gate::denies('work_image_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WorkImageResource($workImage->load(['work']));
    }

    public function update(UpdateWorkImageRequest $request, WorkImage $workImage)
    {
        $workImage->update($request->all());

        return (new WorkImageResource($workImage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(WorkImage $workImage)
    {
        abort_if(Gate::denies('work_image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workImage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
