<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyActionRequest;
use App\Http\Requests\StoreActionRequest;
use App\Http\Requests\UpdateActionRequest;
use App\Models\Action;
use App\Models\Mod;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('action_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actions = Action::with(['mods'])->get();

        return view('admin.actions.index', compact('actions'));
    }

    public function create()
    {
        abort_if(Gate::denies('action_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mods = Mod::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.actions.create', compact('mods'));
    }

    public function store(StoreActionRequest $request)
    {
        $action = Action::create($request->all());

        return redirect()->route('admin.actions.index');
    }

    public function edit(Action $action)
    {
        abort_if(Gate::denies('action_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mods = Mod::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $action->load('mods');

        return view('admin.actions.edit', compact('action', 'mods'));
    }

    public function update(UpdateActionRequest $request, Action $action)
    {
        $action->update($request->all());

        return redirect()->route('admin.actions.index');
    }

    public function show(Action $action)
    {
        abort_if(Gate::denies('action_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action->load('mods');

        return view('admin.actions.show', compact('action'));
    }

    public function destroy(Action $action)
    {
        abort_if(Gate::denies('action_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action->delete();

        return back();
    }

    public function massDestroy(MassDestroyActionRequest $request)
    {
        $actions = Action::find(request('ids'));

        foreach ($actions as $action) {
            $action->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
