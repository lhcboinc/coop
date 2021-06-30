<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavouriteWorkRequest;
use App\Http\Requests\UpdateFavouriteWorkRequest;
use App\Http\Resources\Admin\FavouriteWorkResource;
use App\Models\FavouriteWork;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavouriteWorksApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('favourite_work_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FavouriteWorkResource(FavouriteWork::with(['author', 'work'])->get());
    }

    public function store(StoreFavouriteWorkRequest $request)
    {
        $favouriteWork = FavouriteWork::create($request->all());

        return (new FavouriteWorkResource($favouriteWork))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FavouriteWork $favouriteWork)
    {
        abort_if(Gate::denies('favourite_work_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FavouriteWorkResource($favouriteWork->load(['author', 'work']));
    }

    public function update(UpdateFavouriteWorkRequest $request, FavouriteWork $favouriteWork)
    {
        $favouriteWork->update($request->all());

        return (new FavouriteWorkResource($favouriteWork))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FavouriteWork $favouriteWork)
    {
        abort_if(Gate::denies('favourite_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouriteWork->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
