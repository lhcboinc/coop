<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWorkRequest;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Models\User;
use App\Models\Work;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('work_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $works = Work::with(['client'])->get();

        $users = User::get();

        return view('admin.works.index', compact('works', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('work_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.works.create', compact('clients'));
    }

    public function store(StoreWorkRequest $request)
    {
        $work = Work::create($request->all());

        return redirect()->route('admin.works.index');
    }

    public function edit(Work $work)
    {
        abort_if(Gate::denies('work_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $work->load('client');

        return view('admin.works.edit', compact('clients', 'work'));
    }

    public function update(UpdateWorkRequest $request, Work $work)
    {
        $work->update($request->all());

        return redirect()->route('admin.works.index');
    }

    public function show(Work $work)
    {
        abort_if(Gate::denies('work_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $work->load('client', 'workOffers', 'workWorkImages', 'workFeedback', 'workFavouriteWorks');

        return view('admin.works.show', compact('work'));
    }

    public function destroy(Work $work)
    {
        abort_if(Gate::denies('work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $work->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkRequest $request)
    {
        Work::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
