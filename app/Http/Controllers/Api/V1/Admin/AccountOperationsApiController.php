<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountOperationRequest;
use App\Http\Requests\UpdateAccountOperationRequest;
use App\Http\Resources\Admin\AccountOperationResource;
use App\Models\AccountOperation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountOperationsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_operation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountOperationResource(AccountOperation::with(['user'])->get());
    }

    public function store(StoreAccountOperationRequest $request)
    {
        $accountOperation = AccountOperation::create($request->all());

        return (new AccountOperationResource($accountOperation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AccountOperation $accountOperation)
    {
        abort_if(Gate::denies('account_operation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountOperationResource($accountOperation->load(['user']));
    }

    public function update(UpdateAccountOperationRequest $request, AccountOperation $accountOperation)
    {
        $accountOperation->update($request->all());

        return (new AccountOperationResource($accountOperation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AccountOperation $accountOperation)
    {
        abort_if(Gate::denies('account_operation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountOperation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
