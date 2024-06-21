@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.search.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.searches.update", [$search->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ trans('cruds.search.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $search->title) }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.search.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.search.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $search->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.search.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="url">{{ trans('cruds.search.fields.url') }}</label>
                            <textarea class="form-control" name="url" id="url">{{ old('url', $search->url) }}</textarea>
                            @if($errors->has('url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.search.fields.url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photo_url">{{ trans('cruds.search.fields.photo_url') }}</label>
                            <textarea class="form-control" name="photo_url" id="photo_url">{{ old('photo_url', $search->photo_url) }}</textarea>
                            @if($errors->has('photo_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.search.fields.photo_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="saved" value="0">
                                <input type="checkbox" name="saved" id="saved" value="1" {{ $search->saved || old('saved', 0) === 1 ? 'checked' : '' }}>
                                <label for="saved">{{ trans('cruds.search.fields.saved') }}</label>
                            </div>
                            @if($errors->has('saved'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('saved') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.search.fields.saved_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="task_id">{{ trans('cruds.search.fields.task') }}</label>
                            <select class="form-control select2" name="task_id" id="task_id">
                                @foreach($tasks as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('task_id') ? old('task_id') : $search->task->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('task'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('task') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.search.fields.task_helper') }}</span>
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