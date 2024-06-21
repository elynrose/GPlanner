@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.draft.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drafts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.draft.fields.id') }}
                        </th>
                        <td>
                            {{ $draft->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.draft.fields.title') }}
                        </th>
                        <td>
                            {{ $draft->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.draft.fields.content') }}
                        </th>
                        <td>
                            {{ $draft->content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.draft.fields.task') }}
                        </th>
                        <td>
                            {{ $draft->task->unique_code ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drafts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection