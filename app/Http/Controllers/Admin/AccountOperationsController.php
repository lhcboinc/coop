<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAccountOperationRequest;
use App\Http\Requests\StoreAccountOperationRequest;
use App\Http\Requests\UpdateAccountOperationRequest;
use App\Models\AccountOperation;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountOperationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_operation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountOperations = AccountOperation::with(['user'])->get();

        return view('admin.accountOperations.index', compact('accountOperations'));
    }

    public function create()
    {
        abort_if(Gate::denies('account_operation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.accountOperations.create', compact('users'));
    }

    public function store(StoreAccountOperationRequest $request)
    {
        $accountOperation = AccountOperation::create($request->all());

        return redirect()->route('admin.account-operations.index');
    }

    public function edit(AccountOperation $accountOperation)
    {
        abort_if(Gate::denies('account_operation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accountOperation->load('user');

        return view('admin.accountOperations.edit', compact('users', 'accountOperation'));
    }

    public function update(UpdateAccountOperationRequest $request, AccountOperation $accountOperation)
    {
        $accountOperation->update($request->all());

        return redirect()->route('admin.account-operations.index');
    }

    public function show(AccountOperation $accountOperation)
    {
        abort_if(Gate::denies('account_operation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountOperation->load('user');

        return view('admin.accountOperations.show', compact('accountOperation'));
    }

    public function destroy(AccountOperation $accountOperation)
    {
        abort_if(Gate::denies('account_operation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountOperation->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccountOperationRequest $request)
    {
        AccountOperation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
