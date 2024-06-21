@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.toDo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.to-dos.update", [$toDo->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="item">{{ trans('cruds.toDo.fields.item') }}</label>
                <input class="form-control {{ $errors->has('item') ? 'is-invalid' : '' }}" type="text" name="item" id="item" value="{{ old('item', $toDo->item) }}">
                @if($errors->has('item'))
                    <div class="invalid-feedback">
                        {{ $errors->first('item') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.toDo.fields.item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date">{{ trans('cruds.toDo.fields.due_date') }}</label>
                <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date', $toDo->due_date) }}">
                @if($errors->has('due_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.toDo.fields.due_date_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('completed') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="completed" value="0">
                    <input class="form-check-input" type="checkbox" name="completed" id="completed" value="1" {{ $toDo->completed || old('completed', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="completed">{{ trans('cruds.toDo.fields.completed') }}</label>
                </div>
                @if($errors->has('completed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('completed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.toDo.fields.completed_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('saved') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="saved" value="0">
                    <input class="form-check-input" type="checkbox" name="saved" id="saved" value="1" {{ $toDo->saved || old('saved', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="saved">{{ trans('cruds.toDo.fields.saved') }}</label>
                </div>
                @if($errors->has('saved'))
                    <div class="invalid-feedback">
                        {{ $errors->first('saved') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.toDo.fields.saved_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="task_id">{{ trans('cruds.toDo.fields.task') }}</label>
                <select class="form-control select2 {{ $errors->has('task') ? 'is-invalid' : '' }}" name="task_id" id="task_id">
                    @foreach($tasks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('task_id') ? old('task_id') : $toDo->task->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('task'))
                    <div class="invalid-feedback">
                        {{ $errors->first('task') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.toDo.fields.task_helper') }}</span>
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