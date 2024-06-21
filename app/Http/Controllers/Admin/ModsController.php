<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyModRequest;
use App\Http\Requests\StoreModRequest;
use App\Http\Requests\UpdateModRequest;
use App\Models\Mod;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mod_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mods = Mod::all();

        return view('admin.mods.index', compact('mods'));
    }

    public function create()
    {
        abort_if(Gate::denies('mod_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mods.create');
    }

    public function store(StoreModRequest $request)
    {
        $mod = Mod::create($request->all());

        return redirect()->route('admin.mods.index');
    }

    public function edit(Mod $mod)
    {
        abort_if(Gate::denies('mod_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mods.edit', compact('mod'));
    }

    public function update(UpdateModRequest $request, Mod $mod)
    {
        $mod->update($request->all());

        return redirect()->route('admin.mods.index');
    }

    public function show(Mod $mod)
    {
        abort_if(Gate::denies('mod_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mods.show', compact('mod'));
    }

    public function destroy(Mod $mod)
    {
        abort_if(Gate::denies('mod_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mod->delete();

        return back();
    }

    public function massDestroy(MassDestroyModRequest $request)
    {
        $mods = Mod::find(request('ids'));

        foreach ($mods as $mod) {
            $mod->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
