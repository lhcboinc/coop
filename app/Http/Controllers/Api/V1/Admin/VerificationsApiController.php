<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVerificationRequest;
use App\Http\Requests\UpdateVerificationRequest;
use App\Http\Resources\Admin\VerificationResource;
use App\Models\Verification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('verification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VerificationResource(Verification::with(['user', 'verified_by', 'editor'])->get());
    }

    public function store(StoreVerificationRequest $request)
    {
        $verification = Verification::create($request->all());

        if ($request->input('doc', false)) {
            $verification->addMedia(storage_path('tmp/uploads/' . basename($request->input('doc'))))->toMediaCollection('doc');
        }

        return (new VerificationResource($verification))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Verification $verification)
    {
        abort_if(Gate::denies('verification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VerificationResource($verification->load(['user', 'verified_by', 'editor']));
    }

    public function update(UpdateVerificationRequest $request, Verification $verification)
    {
        $verification->update($request->all());

        if ($request->input('doc', false)) {
            if (!$verification->doc || $request->input('doc') !== $verification->doc->file_name) {
                if ($verification->doc) {
                    $verification->doc->delete();
                }
                $verification->addMedia(storage_path('tmp/uploads/' . basename($request->input('doc'))))->toMediaCollection('doc');
            }
        } elseif ($verification->doc) {
            $verification->doc->delete();
        }

        return (new VerificationResource($verification))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Verification $verification)
    {
        abort_if(Gate::denies('verification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verification->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
