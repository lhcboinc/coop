<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWorkImageRequest;
use App\Http\Requests\StoreWorkImageRequest;
use App\Http\Requests\UpdateWorkImageRequest;
use App\Models\Work;
use App\Models\WorkImage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkImagesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('work_image_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workImages = WorkImage::with(['work'])->get();

        return view('admin.workImages.index', compact('workImages'));
    }

    public function create()
    {
        abort_if(Gate::denies('work_image_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $works = Work::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.workImages.create', compact('works'));
    }

    public function store(StoreWorkImageRequest $request)
    {
        $workImage = WorkImage::create($request->all());

        return redirect()->route('admin.work-images.index');
    }

    public function edit(WorkImage $workImage)
    {
        abort_if(Gate::denies('work_image_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $works = Work::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workImage->load('work');

        return view('admin.workImages.edit', compact('works', 'workImage'));
    }

    public function update(UpdateWorkImageRequest $request, WorkImage $workImage)
    {
        $workImage->update($request->all());

        return redirect()->route('admin.work-images.index');
    }

    public function show(WorkImage $workImage)
    {
        abort_if(Gate::denies('work_image_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workImage->load('work');

        return view('admin.workImages.show', compact('workImage'));
    }

    public function destroy(WorkImage $workImage)
    {
        abort_if(Gate::denies('work_image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workImage->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkImageRequest $request)
    {
        WorkImage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
