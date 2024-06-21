@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.action.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.action.fields.id') }}
                        </th>
                        <td>
                            {{ $action->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.action.fields.name') }}
                        </th>
                        <td>
                            {{ $action->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.action.fields.mods') }}
                        </th>
                        <td>
                            {{ $action->mods->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection