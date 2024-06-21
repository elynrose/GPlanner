<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyToDoRequest;
use App\Http\Requests\StoreToDoRequest;
use App\Http\Requests\UpdateToDoRequest;
use App\Models\Task;
use App\Models\ToDo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToDoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('to_do_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $toDos = ToDo::with(['task', 'created_by'])->get();

        return view('admin.toDos.index', compact('toDos'));
    }

    public function create()
    {
        abort_if(Gate::denies('to_do_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::pluck('unique_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.toDos.create', compact('tasks'));
    }

    public function store(StoreToDoRequest $request)
    {
        $toDo = ToDo::create($request->all());

        return redirect()->route('admin.to-dos.index');
    }

    public function edit(ToDo $toDo)
    {
        abort_if(Gate::denies('to_do_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::pluck('unique_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $toDo->load('task', 'created_by');

        return view('admin.toDos.edit', compact('tasks', 'toDo'));
    }

    public function update(UpdateToDoRequest $request, ToDo $toDo)
    {
        $toDo->update($request->all());

        return redirect()->route('admin.to-dos.index');
    }

    public function show(ToDo $toDo)
    {
        abort_if(Gate::denies('to_do_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $toDo->load('task', 'created_by');

        return view('admin.toDos.show', compact('toDo'));
    }

    public function destroy(ToDo $toDo)
    {
        abort_if(Gate::denies('to_do_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $toDo->delete();

        return back();
    }

    public function massDestroy(MassDestroyToDoRequest $request)
    {
        $toDos = ToDo::find(request('ids'));

        foreach ($toDos as $toDo) {
            $toDo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
