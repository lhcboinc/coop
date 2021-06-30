<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFeedbackRequest;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Work;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedbacksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('feedback_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedback = Feedback::with(['work', 'client', 'worker'])->get();

        return view('admin.feedback.index', compact('feedback'));
    }

    public function create()
    {
        abort_if(Gate::denies('feedback_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $works = Work::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.feedback.create', compact('works', 'clients', 'workers'));
    }

    public function store(StoreFeedbackRequest $request)
    {
        $feedback = Feedback::create($request->all());

        return redirect()->route('admin.feedback.index');
    }

    public function edit(Feedback $feedback)
    {
        abort_if(Gate::denies('feedback_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $works = Work::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $feedback->load('work', 'client', 'worker');

        return view('admin.feedback.edit', compact('works', 'clients', 'workers', 'feedback'));
    }

    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->update($request->all());

        return redirect()->route('admin.feedback.index');
    }

    public function show(Feedback $feedback)
    {
        abort_if(Gate::denies('feedback_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedback->load('work', 'client', 'worker');

        return view('admin.feedback.show', compact('feedback'));
    }

    public function destroy(Feedback $feedback)
    {
        abort_if(Gate::denies('feedback_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedback->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeedbackRequest $request)
    {
        Feedback::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
