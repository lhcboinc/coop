<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserImageRequest;
use App\Http\Requests\StoreUserImageRequest;
use App\Http\Requests\UpdateUserImageRequest;
use App\Models\User;
use App\Models\UserImage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserImagesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_image_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userImages = UserImage::with(['user'])->get();

        return view('admin.userImages.index', compact('userImages'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_image_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userImages.create', compact('users'));
    }

    public function store(StoreUserImageRequest $request)
    {
        $userImage = UserImage::create($request->all());

        return redirect()->route('admin.user-images.index');
    }

    public function edit(UserImage $userImage)
    {
        abort_if(Gate::denies('user_image_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userImage->load('user');

        return view('admin.userImages.edit', compact('users', 'userImage'));
    }

    public function update(UpdateUserImageRequest $request, UserImage $userImage)
    {
        $userImage->update($request->all());

        return redirect()->route('admin.user-images.index');
    }

    public function show(UserImage $userImage)
    {
        abort_if(Gate::denies('user_image_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userImage->load('user');

        return view('admin.userImages.show', compact('userImage'));
    }

    public function destroy(UserImage $userImage)
    {
        abort_if(Gate::denies('user_image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userImage->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserImageRequest $request)
    {
        UserImage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
