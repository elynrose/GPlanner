@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.reminder.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.reminders.update", [$reminder->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="event">{{ trans('cruds.reminder.fields.event') }}</label>
                            <input class="form-control" type="text" name="event" id="event" value="{{ old('event', $reminder->event) }}" required>
                            @if($errors->has('event'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('event') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reminder.fields.event_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date">{{ trans('cruds.reminder.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $reminder->date) }}" required>
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reminder.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="time">{{ trans('cruds.reminder.fields.time') }}</label>
                            <input class="form-control timepicker" type="text" name="time" id="time" value="{{ old('time', $reminder->time) }}">
                            @if($errors->has('time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reminder.fields.time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="saved" value="0">
                                <input type="checkbox" name="saved" id="saved" value="1" {{ $reminder->saved || old('saved', 0) === 1 ? 'checked' : '' }}>
                                <label for="saved">{{ trans('cruds.reminder.fields.saved') }}</label>
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
                            <select class="form-control select2" name="task_id" id="task_id">
                                @foreach($tasks as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('task_id') ? old('task_id') : $reminder->task->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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

        </div>
    </div>
</div>
@endsection