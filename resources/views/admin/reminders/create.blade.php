@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reminder.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reminders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="event">{{ trans('cruds.reminder.fields.event') }}</label>
                <input class="form-control {{ $errors->has('event') ? 'is-invalid' : '' }}" type="text" name="event" id="event" value="{{ old('event', '') }}" required>
                @if($errors->has('event'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reminder.fields.event_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.reminder.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reminder.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time">{{ trans('cruds.reminder.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time') }}">
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reminder.fields.time_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('saved') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="saved" value="0">
                    <input class="form-check-input" type="checkbox" name="saved" id="saved" value="1" {{ old('saved', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="saved">{{ trans('cruds.reminder.fields.saved') }}</label>
                </div>
                @if($errors->has('saved'))
                    <div class="invalid-feedback">
                        {{ $errors->first('saved') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reminder.fields.saved_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="task_id">{{ trans('cruds.reminder.fields.task') }}</label>
                <select class="form-control select2 {{ $errors->has('task') ? 'is-invalid' : '' }}" name="task_id" id="task_id">
                    @foreach($tasks as $id => $entry)
                        <option value="{{ $id }}" {{ old('task_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('task'))
                    <div class="invalid-feedback">
                        {{ $errors->first('task') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reminder.fields.task_helper') }}</span>
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