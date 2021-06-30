<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFavouriteWorkRequest;
use App\Http\Requests\StoreFavouriteWorkRequest;
use App\Http\Requests\UpdateFavouriteWorkRequest;
use App\Models\FavouriteWork;
use App\Models\User;
use App\Models\Work;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavouriteWorksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('favourite_work_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouriteWorks = FavouriteWork::with(['author', 'work'])->get();

        return view('admin.favouriteWorks.index', compact('favouriteWorks'));
    }

    public function create()
    {
        abort_if(Gate::denies('favourite_work_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $works = Work::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.favouriteWorks.create', compact('authors', 'works'));
    }

    public function store(StoreFavouriteWorkRequest $request)
    {
        $favouriteWork = FavouriteWork::create($request->all());

        return redirect()->route('admin.favourite-works.index');
    }

    public function edit(FavouriteWork $favouriteWork)
    {
        abort_if(Gate::denies('favourite_work_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $works = Work::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $favouriteWork->load('author', 'work');

        return view('admin.favouriteWorks.edit', compact('authors', 'works', 'favouriteWork'));
    }

    public function update(UpdateFavouriteWorkRequest $request, FavouriteWork $favouriteWork)
    {
        $favouriteWork->update($request->all());

        return redirect()->route('admin.favourite-works.index');
    }

    public function show(FavouriteWork $favouriteWork)
    {
        abort_if(Gate::denies('favourite_work_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouriteWork->load('author', 'work');

        return view('admin.favouriteWorks.show', compact('favouriteWork'));
    }

    public function destroy(FavouriteWork $favouriteWork)
    {
        abort_if(Gate::denies('favourite_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouriteWork->delete();

        return back();
    }

    public function massDestroy(MassDestroyFavouriteWorkRequest $request)
    {
        FavouriteWork::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
