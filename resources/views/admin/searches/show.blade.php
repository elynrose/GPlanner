@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.search.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.searches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.search.fields.id') }}
                        </th>
                        <td>
                            {{ $search->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.search.fields.title') }}
                        </th>
                        <td>
                            {{ $search->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.search.fields.description') }}
                        </th>
                        <td>
                            {{ $search->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.search.fields.url') }}
                        </th>
                        <td>
                            {{ $search->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.search.fields.photo_url') }}
                        </th>
                        <td>
                            {{ $search->photo_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.search.fields.saved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $search->saved ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.search.fields.task') }}
                        </th>
                        <td>
                            {{ $search->task->unique_code ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.searches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection