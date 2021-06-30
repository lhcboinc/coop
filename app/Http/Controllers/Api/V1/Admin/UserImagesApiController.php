<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserImageRequest;
use App\Http\Requests\UpdateUserImageRequest;
use App\Http\Resources\Admin\UserImageResource;
use App\Models\UserImage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserImagesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_image_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserImageResource(UserImage::with(['user'])->get());
    }

    public function store(StoreUserImageRequest $request)
    {
        $userImage = UserImage::create($request->all());

        return (new UserImageResource($userImage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UserImage $userImage)
    {
        abort_if(Gate::denies('user_image_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserImageResource($userImage->load(['user']));
    }

    public function update(UpdateUserImageRequest $request, UserImage $userImage)
    {
        $userImage->update($request->all());

        return (new UserImageResource($userImage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UserImage $userImage)
    {
        abort_if(Gate::denies('user_image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userImage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
