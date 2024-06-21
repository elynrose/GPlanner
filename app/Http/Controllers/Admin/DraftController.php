<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDraftRequest;
use App\Http\Requests\StoreDraftRequest;
use App\Http\Requests\UpdateDraftRequest;
use App\Models\Draft;
use App\Models\Task;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DraftController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('draft_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drafts = Draft::with(['task', 'created_by'])->get();

        return view('admin.drafts.index', compact('drafts'));
    }

    public function create()
    {
        abort_if(Gate::denies('draft_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::pluck('unique_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.drafts.create', compact('tasks'));
    }

    public function store(StoreDraftRequest $request)
    {
        $draft = Draft::create($request->all());

        return redirect()->route('admin.drafts.index');
    }

    public function edit(Draft $draft)
    {
        abort_if(Gate::denies('draft_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::pluck('unique_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $draft->load('task', 'created_by');

        return view('admin.drafts.edit', compact('draft', 'tasks'));
    }

    public function update(UpdateDraftRequest $request, Draft $draft)
    {
        $draft->update($request->all());

        return redirect()->route('admin.drafts.index');
    }

    public function show(Draft $draft)
    {
        abort_if(Gate::denies('draft_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $draft->load('task', 'created_by');

        return view('admin.drafts.show', compact('draft'));
    }

    public function destroy(Draft $draft)
    {
        abort_if(Gate::denies('draft_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $draft->delete();

        return back();
    }

    public function massDestroy(MassDestroyDraftRequest $request)
    {
        $drafts = Draft::find(request('ids'));

        foreach ($drafts as $draft) {
            $draft->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
