@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tasks.update", [$task->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="unique_code">{{ trans('cruds.task.fields.unique_code') }}</label>
                <input class="form-control {{ $errors->has('unique_code') ? 'is-invalid' : '' }}" type="text" name="unique_code" id="unique_code" value="{{ old('unique_code', $task->unique_code) }}" required>
                @if($errors->has('unique_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unique_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.unique_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.task.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.task.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $task->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date">{{ trans('cruds.task.fields.due_date') }}</label>
                <input class="form-control {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}">
                @if($errors->has('due_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.due_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="call_to_action">{{ trans('cruds.task.fields.call_to_action') }}</label>
                <input class="form-control {{ $errors->has('call_to_action') ? 'is-invalid' : '' }}" type="text" name="call_to_action" id="call_to_action" value="{{ old('call_to_action', $task->call_to_action) }}">
                @if($errors->has('call_to_action'))
                    <div class="invalid-feedback">
                        {{ $errors->first('call_to_action') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.call_to_action_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="actions_id">{{ trans('cruds.task.fields.actions') }}</label>
                <select class="form-control select2 {{ $errors->has('actions') ? 'is-invalid' : '' }}" name="actions_id" id="actions_id">
                    @foreach($actions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('actions_id') ? old('actions_id') : $task->actions->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('actions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('actions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.actions_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection