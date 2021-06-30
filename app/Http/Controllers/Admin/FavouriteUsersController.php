<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFavouriteUserRequest;
use App\Http\Requests\StoreFavouriteUserRequest;
use App\Http\Requests\UpdateFavouriteUserRequest;
use App\Models\FavouriteUser;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavouriteUsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('favourite_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouriteUsers = FavouriteUser::with(['author', 'user'])->get();

        return view('admin.favouriteUsers.index', compact('favouriteUsers'));
    }

    public function create()
    {
        abort_if(Gate::denies('favourite_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.favouriteUsers.create', compact('authors', 'users'));
    }

    public function store(StoreFavouriteUserRequest $request)
    {
        $favouriteUser = FavouriteUser::create($request->all());

        return redirect()->route('admin.favourite-users.index');
    }

    public function edit(FavouriteUser $favouriteUser)
    {
        abort_if(Gate::denies('favourite_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $favouriteUser->load('author', 'user');

        return view('admin.favouriteUsers.edit', compact('authors', 'users', 'favouriteUser'));
    }

    public function update(UpdateFavouriteUserRequest $request, FavouriteUser $favouriteUser)
    {
        $favouriteUser->update($request->all());

        return redirect()->route('admin.favourite-users.index');
    }

    public function show(FavouriteUser $favouriteUser)
    {
        abort_if(Gate::denies('favourite_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouriteUser->load('author', 'user');

        return view('admin.favouriteUsers.show', compact('favouriteUser'));
    }

    public function destroy(FavouriteUser $favouriteUser)
    {
        abort_if(Gate::denies('favourite_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouriteUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyFavouriteUserRequest $request)
    {
        FavouriteUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
