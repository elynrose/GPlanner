<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReminderRequest;
use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Models\Reminder;
use App\Models\Task;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReminderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reminder_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reminders = Reminder::with(['task', 'created_by'])->get();

        return view('admin.reminders.index', compact('reminders'));
    }

    public function create()
    {
        abort_if(Gate::denies('reminder_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::pluck('unique_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reminders.create', compact('tasks'));
    }

    public function store(StoreReminderRequest $request)
    {
        $reminder = Reminder::create($request->all());

        return redirect()->route('admin.reminders.index');
    }

    public function edit(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::pluck('unique_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reminder->load('task', 'created_by');

        return view('admin.reminders.edit', compact('reminder', 'tasks'));
    }

    public function update(UpdateReminderRequest $request, Reminder $reminder)
    {
        $reminder->update($request->all());

        return redirect()->route('admin.reminders.index');
    }

    public function show(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reminder->load('task', 'created_by');

        return view('admin.reminders.show', compact('reminder'));
    }

    public function destroy(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reminder->delete();

        return back();
    }

    public function massDestroy(MassDestroyReminderRequest $request)
    {
        $reminders = Reminder::find(request('ids'));

        foreach ($reminders as $reminder) {
            $reminder->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
