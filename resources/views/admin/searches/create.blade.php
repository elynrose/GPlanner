@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.search.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.searches.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.search.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.search.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.search.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.search.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.search.fields.url') }}</label>
                <textarea class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" name="url" id="url">{{ old('url') }}</textarea>
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.search.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo_url">{{ trans('cruds.search.fields.photo_url') }}</label>
                <textarea class="form-control {{ $errors->has('photo_url') ? 'is-invalid' : '' }}" name="photo_url" id="photo_url">{{ old('photo_url') }}</textarea>
                @if($errors->has('photo_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.search.fields.photo_url_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('saved') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="saved" value="0">
                    <input class="form-check-input" type="checkbox" name="saved" id="saved" value="1" {{ old('saved', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="saved">{{ trans('cruds.search.fields.saved') }}</label>
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



@endsection