@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.toDo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.to-dos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.toDo.fields.id') }}
                        </th>
                        <td>
                            {{ $toDo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.toDo.fields.item') }}
                        </th>
                        <td>
                            {{ $toDo->item }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.toDo.fields.due_date') }}
                        </th>
                        <td>
                            {{ $toDo->due_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.toDo.fields.completed') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $toDo->completed ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.toDo.fields.saved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $toDo->saved ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.toDo.fields.task') }}
                        </th>
                        <td>
                            {{ $toDo->task->unique_code ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.to-dos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection