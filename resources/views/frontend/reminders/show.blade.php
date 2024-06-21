@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.reminder.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.reminders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reminder.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $reminder->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reminder.fields.event') }}
                                    </th>
                                    <td>
                                        {{ $reminder->event }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reminder.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $reminder->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reminder.fields.time') }}
                                    </th>
                                    <td>
                                        {{ $reminder->time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reminder.fields.saved') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $reminder->saved ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reminder.fields.task') }}
                                    </th>
                                    <td>
                                        {{ $reminder->task->unique_code ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.reminders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection