@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.action.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.actions.update", [$action->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.action.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $action->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.action.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mods_id">{{ trans('cruds.action.fields.mods') }}</label>
                            <select class="form-control select2" name="mods_id" id="mods_id" required>
                                @foreach($mods as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('mods_id') ? old('mods_id') : $action->mods->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mods'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mods') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.action.fields.mods_helper') }}</span>
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