<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavouriteUserRequest;
use App\Http\Requests\UpdateFavouriteUserRequest;
use App\Http\Resources\Admin\FavouriteUserResource;
use App\Models\FavouriteUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavouriteUsersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('favourite_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FavouriteUserResource(FavouriteUser::with(['author', 'user'])->get());
    }

    public function store(StoreFavouriteUserRequest $request)
    {
        $favouriteUser = FavouriteUser::create($request->all());

        return (new FavouriteUserResource($favouriteUser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FavouriteUser $favouriteUser)
    {
        abort_if(Gate::denies('favourite_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FavouriteUserResource($favouriteUser->load(['author', 'user']));
    }

    public function update(UpdateFavouriteUserRequest $request, FavouriteUser $favouriteUser)
    {
        $favouriteUser->update($request->all());

        return (new FavouriteUserResource($favouriteUser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FavouriteUser $favouriteUser)
    {
        abort_if(Gate::denies('favourite_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouriteUser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
